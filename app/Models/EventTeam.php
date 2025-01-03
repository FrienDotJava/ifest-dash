<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTeam extends Model
{
    use HasFactory;
    
    protected $table = 'event_team';

    protected $fillable = ['id_event', 'team_id', 'team_name', 'asal_ins', 'alamat_ins', 'nama_pendamping', 'no_hp', 'owner_id', 'status'];

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function event(){
        return $this->belongsTo(AllEvent::class, 'id_event', 'event_code');
    }

    public function team_member(){
        return $this->belongsTo(TeamMember::class, 'team_id', 'team_id');
    }

    public function task(){
        return $this->hasMany(Task::class, 'team_id', 'team_id');
    }
}
