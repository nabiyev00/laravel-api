<?php

namespace App\Http\Controllers;

use App\Http\Resources\FavoriteResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->response(FavoriteResource::collection(auth()->user()->favorites()->paginate(25)));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $user = auth()->user();

        if ($user->favorites()->where('product_id', $request->product_id)->exists()) {
            return $this->error("Product is already in the favorite list", 409);
        }

        try {
            $user->favorites()->attach($request->product_id);
            return $this->success("Product added to favorite list", 201);
        } catch (\Exception $e) {
            return $this->error("Something went wrong: " . $e->getMessage(), 500);
        }
    }

    public function destroy(Request $request, int $id): JsonResponse
    {

        $user = auth()->user();

        if (!Product::where('id', $id)->exists()) {
            return $this->error("Product not found", 404);
        }

        if ($user->hasFavorited($id)) {
            try {
                $user->favorites()->detach($id);
                return $this->success("Product removed from favorite list", 201);
            } catch (\Exception $e) {
                return $this->error("Something went wrong: " . $e->getMessage(), 500);
            }
        }

        return $this->error("Product not favorited", 409);
    }
}
