<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Mail extends Model
{
    public function sender(){

    return $this->belongsTo(User::class,'sender');
}
 	public function reciever(){

    return $this->belongsTo(User::class,'reciever');
}
}
