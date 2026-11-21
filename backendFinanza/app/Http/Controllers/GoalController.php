<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoalContributionRequest;
use App\Http\Requests\GoalRequest;
use App\Http\Resources\GoalResource;
use App\Models\Account;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * Metas de ahorro.
 */
class GoalController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return GoalResource::collection(
            $request->user()->goals()->orderBy('name')->get()
        );
    }

    public function store(GoalRequest $request): GoalResource
    {
        $datos = $request->validated();
        $datos['current_amount'] = $datos['current_amount'] ?? 0;

        return new GoalResource($request->user()->goals()->create($datos));
    }

    public function update(GoalRequest $request, Goal $goal): GoalResource
    {
        // El dueño ya se comprobó en GoalRequest::authorize()
        $datos = $request->validated();
        $datos['current_amount'] = $datos['current_amount'] ?? $goal->current_amount;

        $goal->update($datos);

        return new GoalResource($goal);
    }

    public function destroy(Request $request, Goal $goal): Response
    {
        abort_unless($goal->user_id === $request->user()->id, 404);

        $goal->delete();

        return response()->noContent();
    }

    /**
     * "Abonar fondos": el dinero sale de una cuenta del usuario y se suma a lo ahorrado de la meta.
     * Todo o nada: si algo falla, ni la cuenta ni la meta cambian.
     */
    public function contribute(GoalContributionRequest $request, Goal $goal): GoalResource
    {
        $monto = $request->validated('amount');

        DB::transaction(function () use ($request, $goal, $monto) {
            // Bloquea la fila de la cuenta para que dos abonos a la vez no pisen el saldo
            $cuenta = Account::query()
                ->whereKey($request->validated('account_id'))
                ->where('user_id', $request->user()->id)
                ->lockForUpdate()
                ->firstOrFail();

            // Las tarjetas de crédito pueden quedar en negativo; las demás cuentas necesitan saldo suficiente
            $esCredito = (Account::TYPES[$cuenta->type]['group'] ?? null) === 'credit';

            if (! $esCredito && (float) $cuenta->balance < (float) $monto) {
                throw ValidationException::withMessages([
                    'account_id' => 'Saldo insuficiente en esa cuenta.',
                ]);
            }

            $cuenta->decrement('balance', $monto);
            $goal->increment('current_amount', $monto);
        });

        return new GoalResource($goal->refresh());
    }
}
