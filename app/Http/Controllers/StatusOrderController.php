<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeOrderStatusRequest;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusOrderController extends Controller
{
    public function store(Status $status, ChangeOrderStatusRequest $request)
    {
        $order = Order::find($request->order_id);

        $order->update(['status_id' => $status->id]);
        return response()->json([
            'success' => true,
            'message' => 'Order status updated!'
        ]);
    }
}
