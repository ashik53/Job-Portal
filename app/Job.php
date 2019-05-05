<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
class Job extends Model
{
    //

    protected $guarded = [];

    public function comments(){
    	return $this->hasMany(Comment::class,'job_id');
    }

  
}//class
