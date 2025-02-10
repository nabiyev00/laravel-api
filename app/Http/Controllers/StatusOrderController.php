<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeOrderStatusRequest;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\JsonResponse;

class StatusOrderController extends Controller
{
    public function store(Status $status, ChangeOrderStatusRequest $request): JsonResponse
    {
        $order = Order::find($request->order_id);
        if (!$order) {
            return response()->json(['error' => 'Order not found!'], 404);
        }

        try {
            $order->update(['status_id' => $status->id]);
            
            return response()->json(['message' => 'Order status updated!'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }
}
