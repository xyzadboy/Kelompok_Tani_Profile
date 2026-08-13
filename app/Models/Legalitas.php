<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Legalitas extends Model
{
    protected $table = 'legalitas';
    protected $fillable = ['nama', 'nomor', 'file', 'keterangan'];
}
