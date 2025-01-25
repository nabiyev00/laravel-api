<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use App\Models\UserAddress;

class OrderController extends Controller
{
    public function index()
    {
        return auth()->user()->orders;
    }

    public function store(StoreOrderRequest $request)
    {
        $sum = 0;
        $products = [];
        $notFoundProducts = [];
        $address = UserAddress::find($request->address_id);

        foreach ($request->products as $requestProduct) {
            $product = Product::with('stocks')->find($requestProduct['product_id']);
            $product->quantity = $requestProduct['quantity'];

            if (
                $product->stocks()->find($requestProduct['stock_id']) &&
                $product->stocks()->find($requestProduct['stock_id'])->quantity >= $requestProduct['quantity']
            ) {
                $productWithStock = $product->withStock($requestProduct['stock_id']);
                $sum += $requestProduct['quantity'] * $product->price;
                $productResource = new ProductResource($productWithStock);

                $products[] = $productResource->resolve();
            } else {
                $notFoundProducts[] = $requestProduct;
            }
        }
        if ($notFoundProducts !== []) {
            return response()->json([
                'success' => false,
                'message' => 'Some products not found or does not have enough stock',
            ]);
        }
        if ($products !== [] && $sum > 0) {
            $order = auth()->user()->orders()->create([
                'comment' => $request->comment,
                'delivery_method_id' => $request->delivery_method_id,
                'payment_type_id' => $request->payment_type_id,
                'sum' => $sum,
                'status_id' => in_array($request->payment_type_id, [1, 2]) ? 1 : 10,
                'address' => $address,
                'products' => $products,
            ]);

            if ($order) {
                foreach ($products as $product) {
                    $stock = Stock::find($product['inventory'][0]['id']);
                    $stock->quantity -= $product['order_quantity'];
                    $stock->save();
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong',
        ]);
    }

    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
