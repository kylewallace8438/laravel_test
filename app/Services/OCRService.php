<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class OCRService
{
    public function processImage(mixed $image)
    {
        $response = Http::withHeaders([
            'apikey' => config('ocr.api_key'),
        ])->post(config('ocr.api_url'), [
            'file' => fopen($image->getRealPath(), 'r'),
            'filetype' => 'jpeg',
            'OCREngine' => 2,
        ]);

        return $response->body();
    }
}
