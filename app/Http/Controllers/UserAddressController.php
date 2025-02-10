<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;
use App\Http\Resources\UserAddressResource;
use App\Models\UserAddress;
use Illuminate\Http\JsonResponse;

class UserAddressController extends Controller
{
    public function index(): JsonResponse
    {
        $user = auth()->user();

        if (!$user) {
            return $this->error("Unauthorized", 401);
        }

        return $this->response(UserAddressResource::collection($user->useraddresses));
    }

    public function store(StoreUserAddressRequest $request): JsonResponse
    {
        $user = auth()->user();

        if (!$user) {
            return $this->error("Unauthorized", 401);
        }

        $address = $user->useraddresses()->create($request->validated());

        return $this->success("User address created", 201, new UserAddressResource($address));
    }

    public function show(UserAddress $userAddress): JsonResponse
    {
        return $this->response(new UserAddressResource($userAddress));
    }

    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress): JsonResponse
    {
        $userAddress->update($request->validated());

        return $this->success("User address updated", 200, new UserAddressResource($userAddress));
    }

    public function destroy(UserAddress $userAddress): JsonResponse
    {
        $userAddress->delete();

        return $this->success('Address deleted successfully');
    }
}
