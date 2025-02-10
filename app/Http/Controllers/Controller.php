<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{

    public function response($data = [], int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status' => $status,
            'data' => $data,
        ], $status);
    }

    public function success(string $message, int $status = 200, $data = []): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public function error(string $message, int $status = 400, $data = []): JsonResponse
    {
        return response()->json([
            'success' => false,
            'status' => $status,
            'message' => $message,
            'error' => $data
        ], $status);
    }
}
