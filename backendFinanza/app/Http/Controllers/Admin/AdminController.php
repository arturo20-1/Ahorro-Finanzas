<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\UserResource;
use App\Models\Account;
use App\Models\Category;
use App\Models\Goal;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Panel de administrador (rutas protegidas por auth:sanctum + admin + admin.ip).
 */
class AdminController extends Controller
{
    /**
     * Métricas globales de la plataforma.
     */
    public function summary(): JsonResponse
    {
        return response()->json(['data' => [
            'users' => User::where('is_admin', false)->count(),
            'accounts' => Account::count(),
            'transactions' => Transaction::count(),
            'volume' => (float) Transaction::sum('amount'),
            'goals' => Goal::count(),
            'categories' => Category::count(),
            'expense_categories' => Category::where('type', Category::TYPE_EXPENSE)->count(),
            'income_categories' => Category::where('type', Category::TYPE_INCOME)->count(),
        ]]);
    }

    /**
     * Usuarios registrados (paginado, 10 por página).
     */
    public function users(): AnonymousResourceCollection
    {
        return UserResource::collection(
            User::query()
                ->withCount(['accounts', 'transactions'])
                ->orderByDesc('id')
                ->paginate(10)
        );
    }

    public function categories(): AnonymousResourceCollection
    {
        return CategoryResource::collection(
            Category::query()->withCount('transactions')->orderBy('type')->orderBy('name')->get()
        );
    }

    public function storeCategory(CategoryRequest $request): CategoryResource
    {
        return new CategoryResource(Category::create($request->validated()));
    }
}
