<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorDarah extends Model
{
    use HasFactory;

    protected $table = 'donor_darah';

    protected $fillable = [
        'nama',
        'npm',
        'email',
        'no_hp',
        'umur',
        'berat_badan',
        'golongan_darah',
        'hal',
        'hari',
    ];
}
