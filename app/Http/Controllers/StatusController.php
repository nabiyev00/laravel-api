<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        if ($request->has('for')) {
            return $this->response(StatusResource::collection(Status::where('for', $request->for)->get()));
        }
        return $this->response(StatusResource::collection(Status::all()));
    }

    public function create()
    {

    }

    public function store(StoreStatusRequest $request)
    {

    }

    public function show(Status $status)
    {

    }

    public function edit(Status $status)
    {

    }

    public function update(UpdateStatusRequest $request, Status $status)
    {

    }

    public function destroy(Status $status)
    {

    }
}
