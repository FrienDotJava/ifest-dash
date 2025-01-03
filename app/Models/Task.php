<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    protected $fillable = ['task_id', 'id_event' ,'task_name', 'task_location', 'owner_id', 'team_id'];

    public function task(){
        return $this->belongsTo(Detail_task::class, 'task_id', 'task_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function event(){
        return $this->belongsTo(AllEvent::class, 'task_event_code', 'id_event');
    }
}
