<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentTypeRequest;
use App\Http\Requests\UpdatePaymentTypeRequest;
use App\Http\Resources\PaymentTypeResource;
use App\Models\PaymentType;
use Illuminate\Http\JsonResponse;

class PaymentTypeController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->response(PaymentTypeResource::collection(PaymentType::all()));
    }

    public function store(StorePaymentTypeRequest $request)
    {
        //
    }

    public function show(PaymentType $paymentType)
    {
        //
    }

    public function update(UpdatePaymentTypeRequest $request, PaymentType $paymentType)
    {
        //
    }

    public function destroy(PaymentType $paymentType)
    {
        //
    }
}
