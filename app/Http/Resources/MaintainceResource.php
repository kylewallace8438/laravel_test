<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaintainceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'details' => $this->details,
            'total' => $this->total,
            'odometer' => $this->odometer,
            'brand' => $this->whenLoaded('brand') ? $this->brand : null,
            'bike_model' => $this->bike_model,
            'maintainer' => $this->whenLoaded('maintainer') ? new UserCommonResource($this->maintainer) : null,
            'plate' => $this->plate,
            'images' => $this->whenLoaded('images') ? MaintainanceImageResource::collection($this->images) : null,
            'qr' => $this->whenLoaded('qrLog') ? $this->qrLog?->qr_path : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
