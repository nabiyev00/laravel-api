<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Collection;

class UserAddressController extends Controller
{
    public function index(): Collection
    {
        return auth()->user()->useraddresses;
    }

    public function store(StoreUserAddressRequest $request)
    {
        auth()->user()->useraddresses()->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Address added successfully',
        ]);
    }

    public function show(UserAddress $userAddress)
    {
        //
    }

    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress)
    {
        //
    }

    public function destroy(UserAddress $userAddress)
    {
        //
    }
}
