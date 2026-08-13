<?php

namespace App\Http\Controllers;

use App\Models\Galleries;

class GalleryController extends Controller
{
    /**
     * Menampilkan daftar galeri foto kegiatan.
     */
    public function index()
    {
        // Mengambil foto galeri terbaru dengan paginasi 9 foto per halaman
        $galleries = Galleries::latest()->paginate(9);

        return view('pages.galeri', compact('galleries'));
    }
}
