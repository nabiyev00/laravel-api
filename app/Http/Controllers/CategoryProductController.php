<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryProductController extends Controller
{
    public function index(Category $category): JsonResponse
    {
        return $this->response(ProductResource::collection($category->products()->cursorPaginate(25)));
    }
}
