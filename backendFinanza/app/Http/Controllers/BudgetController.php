<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Http\Resources\BudgetResource;
use App\Models\Budget;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

/**
 * Presupuestos: un límite de gasto por categoría y por periodo.
 */
class BudgetController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $presupuestos = $request->user()->budgets()
            ->with('category')
            ->orderByDesc('start_date')
            ->get()
            ->each(fn (Budget $p) => $this->conGasto($request, $p));

        return BudgetResource::collection($presupuestos);
    }

    public function store(BudgetRequest $request): BudgetResource
    {
        $presupuesto = $request->user()->budgets()->create($request->validated());

        return new BudgetResource($this->conGasto($request, $presupuesto->load('category')));
    }

    public function update(BudgetRequest $request, Budget $budget): BudgetResource
    {
        // El dueño ya se comprobó en BudgetRequest::authorize()
        $budget->update($request->validated());

        return new BudgetResource($this->conGasto($request, $budget->load('category')));
    }

    public function destroy(Request $request, Budget $budget): Response
    {
        abort_unless($budget->user_id === $request->user()->id, 404);

        $budget->delete();

        return response()->noContent();
    }

    /**
     * Calcula cuánto se ha gastado en la categoría dentro de las fechas del presupuesto.
     */
    private function conGasto(Request $request, Budget $presupuesto): Budget
    {
        $gastado = Transaction::query()
            ->where('user_id', $request->user()->id)
            ->where('type', Transaction::TYPE_EXPENSE)
            ->where('category_id', $presupuesto->category_id)
            ->whereBetween('transaction_date', [
                $presupuesto->start_date->toDateString(),
                $presupuesto->end_date->toDateString(),
            ])
            ->sum('amount');

        $presupuesto->setAttribute('spent', (float) $gastado);

        return $presupuesto;
    }
}
