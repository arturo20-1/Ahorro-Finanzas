<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Services\TransactionRecorder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TransactionController extends Controller
{
    /**
     * Lista paginada. Filtros opcionales: ?type=income|expense&account_id=3
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $transacciones = Transaction::query()
            ->where('user_id', $request->user()->id)
            ->when(
                in_array($request->query('type'), [Transaction::TYPE_INCOME, Transaction::TYPE_EXPENSE], true),
                fn ($q) => $q->where('type', $request->query('type'))
            )
            ->when($request->integer('account_id') > 0, fn ($q) => $q->where('account_id', $request->integer('account_id')))
            ->with(['category', 'account'])
            ->orderByDesc('transaction_date')
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return TransactionResource::collection($transacciones);
    }

    public function store(StoreTransactionRequest $request, TransactionRecorder $registrador): JsonResponse
    {
        $datos = collect($request->validated())->except('submission_token')->all();

        $transaccion = $registrador->record($request->user(), $datos);

        return (new TransactionResource($transaccion->load(['category', 'account'])))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Request $request, Transaction $transaction): TransactionResource
    {
        abort_unless($transaction->user_id === $request->user()->id, 404);

        return new TransactionResource($transaction->load(['category', 'account']));
    }
}
