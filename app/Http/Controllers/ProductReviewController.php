<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{

    public function index(Product $product): JsonResponse
    {
        return $this->response([
            'overall_rating' => $product->reviews()->avg('rating'),
            'review_count' => $product->reviews()->count(),
            'reviews' => ReviewResource::collection($product->reviews()->paginate(10)),
        ]);
    }

    public function store(Product $product, StoreReviewRequest $request): JsonResponse
    {
        $product->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'body' => $request->body
        ]);
        return $this->success('Review created successfully', 201);
    }

    public function show(string $id)
    {

    }

    public function update(Request $request, string $id)
    {

    }

    public function destroy(string $id)
    {

    }
}
