<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllEvent extends Model
{
    use HasFactory;

    protected $table = 'event_perio';

    protected $fillable = ['event_name', 'description', 'price', 'task_event_code', 'event_type', 'start_regis', 'close_regis', 'cm_soon', 'image_event'];

    public function task(){
        return $this->belongsTo(Detail_task::class, 'event_id', 'task_event_code');
    }
}
