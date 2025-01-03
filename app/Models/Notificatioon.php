<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificatioon extends Model
{
    use HasFactory;

    protected $table = 'notification';

    protected $fillable = ['id', 'id_team', 'id_event', 'message'];

    public function team(){
        return $this->belongsTo(EventTeam::class, 'id_team', 'team_id');
    }

    public function event(){
        return $this->belongsTo(AllEvent::class, 'id_event', 'event_code');
    }
}
