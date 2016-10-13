<?php

namespace App;
use App\Task;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{

	protected $fillable = ['name','quantity','task_id'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
