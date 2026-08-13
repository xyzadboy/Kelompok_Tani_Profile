<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $table = 'contact_person';

    protected $fillable = [
        'nama',
        'posisi',
        'nomor',
        'email',
        'foto',
        'deskripsi',
    ];
}
