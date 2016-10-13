<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Task;

class Storerandom extends Model
{
public function user()
    {
        return $this->belongsTo(User::class);
    }

public function task_1s()
    {
        return $this->belongsTo(Task::class,'task_1');
    }
public function task_2s()
    {
        return $this->belongsTo(Task::class,'task_2');
    }   
public function task_3s()
    {
        return $this->belongsTo(Task::class,'task_3');
    }
public function task_4s()
    {
        return $this->belongsTo(Task::class,'task_4');
    }    
}

