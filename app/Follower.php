<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
 
class Follower extends Model
{
	public function followeri(){

    return $this->belongTo(User::class,'follow_id');
}

}
