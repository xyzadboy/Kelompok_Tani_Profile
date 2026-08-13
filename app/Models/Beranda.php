<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    public $table = 'beranda';

    protected $fillable = ['logo', 'visi', 'misi', 'sejarah'];
}
