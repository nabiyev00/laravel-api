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
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        $orders = auth()->user()->orders();
        if (request()->has('status_id')) {
            return $this->response(
                OrderResource::collection($orders->where('status_id', request('status_id'))->paginate(10))
            );
        }
        return $this->response(
            OrderResource::collection($orders->paginate(10))
        );
    }

    public function store(StoreOrderRequest $request): JsonResponse
    {
        try {
            $sum = 0;
            $products = [];
            $notFoundProducts = [];

            $address = UserAddress::find($request->address_id);
            if (!$address) {
                return $this->error('Address not found', 404);
            }

            foreach ($request->products as $requestProduct) {
                $product = Product::with('stocks')->find($requestProduct['product_id']);

                if (!$product) {
                    $notFoundProducts[] = $requestProduct;
                    continue;
                }

                $stock = $product->stocks()->find($requestProduct['stock_id']);

                if ($stock && $stock->quantity >= $requestProduct['quantity']) {
                    $productWithStock = $product->withStock($requestProduct['stock_id']);
                    $sum += $requestProduct['quantity'] * $product->price;

                    $productResource = new ProductResource($productWithStock);
                    $productData = $productResource->resolve();
                    $productData['order_quantity'] = $requestProduct['quantity']; // Buyurtma miqdorini qo‘shamiz

                    $products[] = $productData;
                } else {
                    $notFoundProducts[] = $requestProduct;
                }
            }

            if (!empty($notFoundProducts)) {
                return $this->error(
                    'Some products not found or do not have enough stock',
                    400,
                    ['not_found_products' => $notFoundProducts]
                );
            }

            if (!empty($products) && $sum > 0) {
                $order = auth()->user()->orders()->create([
                    'comment' => $request->comment,
                    'delivery_method_id' => $request->delivery_method_id,
                    'payment_type_id' => $request->payment_type_id,
                    'sum' => $sum,
                    'status_id' => in_array($request->payment_type_id, [1, 2]) ? 1 : 10,
                    'address' => $address->toArray(), // Ob'ekt emas, massiv saqlash yaxshiroq
                    'products' => $products,
                ]);

                if ($order) {
                    foreach ($products as $product) {
                        $stock = Stock::find($product['inventory'][0]['id']);
                        if ($stock) {
                            $stock->decrement('quantity', $product['order_quantity']);
                        }
                    }
                }

                return $this->success('Order created successfully', 201, ['order' => $order]);
            }

            return $this->error('Something went wrong', 500);
        } catch (\Exception $e) {
            return $this->error('Internal server error', 500, ['error' => $e->getMessage()]);
        }
    }

    public function show(Order $order): JsonResponse
    {
        return $this->response([
            'orders' => new OrderResource($order)
        ]);
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
