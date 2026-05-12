<?php

namespace App\Http\Controllers;

use App\Models\QrLog;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function serve(string $uuid)
    {
        $qrLog = QrLog::where('uuid', $uuid)->first();
        if (!$qrLog) {
            abort(404);
        }
        $data = $qrLog->maintenance()->with(['maintainer', 'images'])->first();
        return view('qr_serve', ['data' => $data]);
    }
}
