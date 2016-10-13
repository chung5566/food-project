<?php

namespace App;

use App\Task;
use App\Followers;
use App\School;
use App\Comment;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','country','birth','identity', 
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the tasks for the user.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    public function follows()
    {
        return $this->belongsToMany(User::class, Follower::class, 'user_id', 'follow_id');
    }
    public function collects()
    {
        return $this->belongsToMany(Task::class, Collect::class, 'user_id', 'task_id');
    }
    public function storerandom()
    {
        return $this->hasMany(Storerandom::class);
    }
    public function school()
    {
        return $this->hasMany(School::class);
    }
    public function comment(){

        return $this->hasMany(Comment::class);
    }

}   
