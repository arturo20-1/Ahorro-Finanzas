<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

/**
 * CRUD de cuentas por API. Se registra con Route::apiResource.
 */
class AccountController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $cuentas = $request->user()->accounts()
            ->withCount('transactions')
            ->orderBy('name')
            ->get();

        return AccountResource::collection($cuentas);
    }

    public function store(AccountRequest $request): AccountResource
    {
        $cuenta = $request->user()->accounts()->create($request->validated());

        return new AccountResource($cuenta);
    }

    public function show(Request $request, Account $account): AccountResource
    {
        $this->comprobarDueno($request, $account);

        return new AccountResource($account->loadCount('transactions'));
    }

    public function update(AccountRequest $request, Account $account): AccountResource
    {
        // El dueño ya se comprobó en AccountRequest::authorize()

        $account->update($request->validated());

        return new AccountResource($account);
    }

    public function destroy(Request $request, Account $account): Response
    {
        $this->comprobarDueno($request, $account);

        $account->delete();

        return response()->noContent(); // 204, sin cuerpo
    }

    /**
     * Una cuenta ajena se trata como si no existiera.
     */
    private function comprobarDueno(Request $request, Account $account): void
    {
        abort_unless($account->user_id === $request->user()->id, 404);
    }
}
