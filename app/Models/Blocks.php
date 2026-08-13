<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blocks extends Model
{
    use HasFactory;

    protected $table = 'blocks';

    protected $fillable = [
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
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'luas' => 'decimal:2',
        'tanggal_tanam' => 'date',
        'tanggal_panen' => 'date',
    ];

    // Scope untuk data aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk pencarian
    public function scopeCari($query, $keyword)
    {
        return $query->where('kode_blok', 'LIKE', "%{$keyword}%")
            ->orWhere('penanggung_jawab', 'LIKE', "%{$keyword}%")
            ->orWhere('komoditas', 'LIKE', "%{$keyword}%");
    }

    // Accessor untuk menampilkan luas dengan satuan
    public function getLuasFormatAttribute()
    {
        return $this->luas.' Ha';
    }

    // Accessor untuk koordinat
    public function getKoordinatAttribute()
    {
        return $this->latitude.', '.$this->longitude;
    }
}
