<?php

namespace App;
use App\Step;
use App\Ingredient;
use App\User;
use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name','article_type','cooktime','portion','shortintro','tip','img_url','ingridients[]','quantity[]','intro[]','style_1','style_2','style_3','popular'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];
    

    
    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }
    public function collects()
    {
    return $this->belongsToMany(User::class, 'collect');
    }
    public function comments()
    {
    return $this->hasMany(Comment::class);
    }
        
}
