<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BudgetResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BudgetController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return BudgetResource::collection(
            $request->user()->budgets()->with('category')->orderByDesc('start_date')->get()
        );
    }
}
