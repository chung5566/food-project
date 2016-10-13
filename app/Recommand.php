<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Task;


class Recommand extends Model
{
    public function user(){
    	return $this->belongTo(User::class);
    }
    public function task(){
    	return $this->belongTo(Task::class);
    }
}
