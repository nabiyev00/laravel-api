<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return auth()->user()->favorites()->paginate(25);
    }

    public function store(Request $request): JsonResponse
    {
        auth()->user()->favorites()->attach($request->product_id);

        return response()->json([
            'success' => true,
        ]);
    }

    public function destroy(Request $request, int $id): JsonResponse
    {

        if (auth()->user()->hasFavorited($id)) {
            auth()->user()->favorites()->detach($id);

            return response()->json([
                'success' => true,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product not favorited',
        ]);
    }
}
