<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->response(ProductResource::collection(Product::cursorPaginate(25)));
    }

    public function store(StoreProductRequest $request)
    {
        //
    }

    public function show(Product $product): JsonResponse
    {
        return $this->response(new ProductResource($product));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
