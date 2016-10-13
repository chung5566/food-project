<?php

namespace App;
use App\Task;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{

	protected $fillable = ['text','img_url','task_id'];


    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
