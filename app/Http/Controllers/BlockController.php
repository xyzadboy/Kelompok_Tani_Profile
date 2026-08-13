<?php

namespace App\Http\Controllers;

use App\Models\Blocks;
use Illuminate\Http\JsonResponse;

class BlockController extends Controller
{
    /**
     * Ambil semua data blok lahan untuk ditampilkan di peta.
     */
    public function getBlocks(): JsonResponse
    {
        try {
            $blocks = Blocks::select([
                'id',
                'kode_blok',
                'penanggung_jawab',
                'luas',
                'komoditas',
                'latitude',
                'longitude',
                'deskripsi',
                'status',
                'telepon',
                'alamat',
                'tanggal_tanam',
                'tanggal_panen',
            ])
                ->orderBy('kode_blok', 'asc')
                ->get()
                ->map(function ($block) {
                    return [
                        'id' => $block->id,
                        'kode_blok' => $block->kode_blok,
                        'penanggung_jawab' => $block->penanggung_jawab,
                        'luas' => (float) $block->luas,
                        'komoditas' => $block->komoditas,
                        'latitude' => (float) $block->latitude,
                        'longitude' => (float) $block->longitude,
                        'deskripsi' => $block->deskripsi,
                        'status' => $block->status,
                        'telepon' => $block->telepon,
                        'alamat' => $block->alamat,
                        'tanggal_tanam' => $block->tanggal_tanam
                                                    ? $block->tanggal_tanam->format('d M Y')
                                                    : null,
                        'tanggal_panen' => $block->tanggal_panen
                                                    ? $block->tanggal_panen->format('d M Y')
                                                    : null,
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $blocks,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data blok lahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
