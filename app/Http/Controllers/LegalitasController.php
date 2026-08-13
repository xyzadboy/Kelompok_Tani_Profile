<?php

namespace App\Http\Controllers;

use App\Models\Legalitas;
use Illuminate\Support\Facades\Storage;

class LegalitasController extends Controller
{
    /**
     * Menampilkan daftar legalitas kelompok tani.
     */
    public function index()
    {
        // Mengambil semua data legalitas terurut berdasarkan yang terbaru
        $legalitasList = Legalitas::latest()->get();

        return view('pages.legalitas', compact('legalitasList'));
    }

    /**
     * Mengunduh file dokumen legalitas.
     */
    public function download($id)
    {
        $legalitas = Legalitas::findOrFail($id);

        if (Storage::disk('public')->exists($legalitas->file)) {
            return Storage::disk('public')->download($legalitas->file, $legalitas->nama.'.pdf');
        }

        return back()->with('error', 'File dokumen tidak ditemukan.');
    }
}
