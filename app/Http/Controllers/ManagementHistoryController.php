<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMaintainanceHistoryRequest;
use App\Http\Resources\MaintainceResource;
use App\Services\QrService;
use Illuminate\Http\File;
use \App\Services\ManagementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManagementHistoryController extends Controller
{
    public function __construct(
        protected ManagementService $managementService,
    )
    {

    }

    public function getMyHistory(Request $request)
    {
        // Logic to get bike history for the authenticated user
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function store(CreateMaintainanceHistoryRequest $request)
    {
        try {
            $data = array_merge($request->all(), [
                'maintainer_id' => $request->user()->id
            ]);

            $imagePaths = [];
            if ($request->file('images')) {
                $files = is_array($request->file('images')) ? $request->file('images') : [$request->file('images')];
                foreach ($files as $file) {
                    $imagePaths[] = ['image_path' => Storage::disk('public')->putFile('maintainance', $file)];
                }
            }
            $result = $this->managementService->store(array_merge($data, ['images' => $imagePaths]));

            return new MaintainceResource($result);
        } catch (\Exception $e) {
            // Delete saved images if operation fails
            if (!empty($imagePaths)) {
                foreach ($imagePaths as $imageData) {
                    Storage::disk('public')->delete($imageData['image_path']);
                }
            }

            return response()->json([
                'message' => 'Failed to create maintenance history record',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        // Logic to retrieve a specific bike history record
    }

    public function update(Request $request, int $id)
    {
        // Logic to update a specific bike history record
    }

    public function destroy(int $id)
    {
        // Logic to delete a specific bike history record
    }
}
