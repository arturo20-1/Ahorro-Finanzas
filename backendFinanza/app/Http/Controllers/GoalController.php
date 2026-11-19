<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoalContributionRequest;
use App\Http\Requests\GoalRequest;
use App\Http\Resources\GoalResource;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

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
     * "Abonar fondos": suma un monto a lo ahorrado de la meta.
     */
    public function contribute(GoalContributionRequest $request, Goal $goal): GoalResource
    {
        $goal->increment('current_amount', $request->validated('amount'));

        return new GoalResource($goal->refresh());
    }
}
