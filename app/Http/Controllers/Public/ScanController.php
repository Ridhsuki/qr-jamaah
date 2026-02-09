<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Pilgrim;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    /**
     * Menampilkan Digital Identity untuk Petugas Lapangan.
     */
    public function show(Pilgrim $pilgrim)
    {
        if (auth()->check()) {
            return redirect()->route('admin.pilgrims.show', $pilgrim);
        }

        return view('public.scan_result', [
            'pilgrim' => $pilgrim,
            'is_officer_view' => true,
        ]);
    }
}
