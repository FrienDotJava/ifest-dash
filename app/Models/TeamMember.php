<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $table = 'team_member';

    protected $fillable = ['id_event', 'team_id', 'nama_anggota', 'no_iden', 'email', 'no_telp', 'id_line', 'instagram', 'tgl_lahir', 'asal_ins', 'alamat_ins'];
}
