<?php

namespace App;
use App\Task;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
	public function task()
    {
        return $this->hasOne(Task::class);
    }
}
