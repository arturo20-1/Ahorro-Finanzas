<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GoalResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GoalController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return GoalResource::collection(
            $request->user()->goals()->orderBy('name')->get()
        );
    }
}
