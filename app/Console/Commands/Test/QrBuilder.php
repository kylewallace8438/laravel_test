<?php

namespace App\Console\Commands\Test;

use App\Services\QrService;
use Illuminate\Console\Command;

class QrBuilder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:qr-builder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $qrService = new QrService();

        $filePath = $qrService->generate('1\r\n2\r\n3', [
            'size' => 500,
            'margin' => 20,
            'label_text' => '15n123690_13052026',
            'label_font_size' => 16,
            'filename' => 'qrcode',
        ]);

        $this->info('QR code generated successfully: ' . $filePath);
    }
}
