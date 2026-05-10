<?php

namespace App\Http\Controllers;

use App\Http\Resources\Bikes\BikeResource;
use App\Services\BikeServices\BikeManagementService;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    public function __construct(
        protected BikeManagementService $bikeManagementService
    )
    {

    }

    public function index()
    {
        return BikeResource::collection($this->bikeManagementService->listAllBikes());
    }

    public function getMyBikes(Request $request)
    {
        $authUser = $request->user();
        // Assuming you have a method to list bikes for a specific user
        return BikeResource::collection($this->bikeManagementService->listBikesForUser($authUser->id, $request->all()));
    }

    public function store(Request $request)
    {
        $authUser = $request->user();
        $request->merge(['user_id' => $authUser->id]);
        return $this->bikeManagementService->createBike($request);
    }

    public function show(int $id)
    {
        return $this->bikeManagementService->getBike($id);
    }

    public function update(Request $request, int $id)
    {
        return $this->bikeManagementService->updateBike($id, $request->all());
    }

    public function destroy(int $id)
    {
        return $this->bikeManagementService->deleteBike($id);
    }

}
