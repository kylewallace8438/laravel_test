<?php

namespace App\Services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class QrService
{
    /**
     * Generate a QR code
     *
     * @param string $data The data to encode in the QR code
     * @param array $options Configuration options for QR code generation
     * @return string Path to the generated QR code file
     */
    public function generate(string $data, array $options = []): string
    {
        $defaults = [
            'size' => 500,
            'margin' => 20,
            'encoding' => 'UTF-8',
            'error_correction' => ErrorCorrectionLevel::High,
            'logo_path' => '',
            'logo_resize_to_width' => 50,
            'logo_punchout_background' => true,
            'label_text' => '',
            'label_font_size' => 16,
            'label_alignment' => LabelAlignment::Center,
            'filename' => 'qrcode',
        ];

        $config = array_merge($defaults, $options);

        $builder = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: $data,
            encoding: new Encoding($config['encoding']),
            errorCorrectionLevel: $config['error_correction'],
            size: $config['size'],
            margin: $config['margin'],
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            logoPath: $config['logo_path'],
            logoResizeToWidth: $config['logo_resize_to_width'],
            logoPunchoutBackground: $config['logo_punchout_background'],
            labelText: $config['label_text'],
            labelFont: new OpenSans($config['label_font_size']),
            labelAlignment: $config['label_alignment']
        );

        $result = $builder->build();

        // Ensure directory exists with proper permissions using Storage
        \Illuminate\Support\Facades\Storage::disk('public')->makeDirectory('qr', 0755, true, true);
        $relativePath = '/qr' . '/' . $config['filename'] . '.png';
        $filePath = storage_path('app/public') . '/' . $relativePath;
        $result->saveToFile($filePath);

        return $relativePath;
    }

    /**
     * Generate a QR code and return the public URL
     *
     * @param string $data The data to encode in the QR code
     * @param array $options Configuration options for QR code generation
     * @return string Public URL to the generated QR code
     */
    public function generateAndGetUrl(string $data, array $options = []): string
    {
        $filePath = $this->generate($data, $options);
        $relativePath = str_replace(storage_path('app/public'), '', $filePath);
        return url('storage' . $relativePath);
    }
}
