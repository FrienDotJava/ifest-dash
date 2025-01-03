<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Detail_task extends Model
{
    use HasFactory;

    protected $table = 'detail_task';

    public function task(){
        return $this->hasMany(Task::class, 'task_id', 'task_id');
    }
}
