<?php
namespace App\Services;

use App\Models\Bike;
use App\Models\MaintainanceHistory;
use App\Models\QrLog;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ManagementService
{
    public function __construct(
        protected QrService $qrService
    )
    {

    }

    public function store(array $data)
    {
        try {
            $data = Arr::only($data, [
                'bike_id',
                'details',
                'total',
                'odometer',
                'brand_id',
                'bike_model',
                'maintainer_id',
                'plate',
                'images'
            ]);
            return DB::transaction(function () use ($data) {
                $maintainance = MaintainanceHistory::create($data);
                $maintainance->images()->createMany(Arr::get($data, 'images', []));
                $uuid = Str::uuid7()->toString();
                $qrPath = $this->qrService->generate(
                    route('qr.serve', ['uuid' => $uuid]),
                    [
                        'label_text' => "{$maintainance->bike_model} - " . \Carbon\Carbon::now()->format('Y-m-d'), 'filename' => "maintainance_{$maintainance->id}"
                    ]
                );
                $maintainance->qrLog()->create([
                    'qr_path' => $qrPath,
                    'uuid' => $uuid
                ]);
                return $maintainance;
            });
        } catch (\Exception $e) {
            // Handle the exception, log it, or return an error response
            throw $e; // Rethrow the exception for now
        }
    }

}
