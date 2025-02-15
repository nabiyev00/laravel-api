<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryMethodRequest;
use App\Http\Requests\UpdateDeliveryMethodRequest;
use App\Http\Resources\DeliveryMethodResource;
use App\Models\DeliveryMethod;
use Illuminate\Http\JsonResponse;

class DeliveryMethodController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->response(DeliveryMethodResource::collection(DeliveryMethod::cursorPaginate(25)));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliveryMethodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryMethod $deliveryMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryMethod $deliveryMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryMethodRequest $request, DeliveryMethod $deliveryMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryMethod $deliveryMethod)
    {
        //
    }
}
