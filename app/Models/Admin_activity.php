<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_activity extends Model
{
    use HasFactory;

    protected $table = 'admin_activity';

    protected $fillable = ['id_admin', 'activity', 'icon'];

    public function admin_staff(){
        return $this->belongsTo(User::class, 'id_admin', 'id');
    }
}
