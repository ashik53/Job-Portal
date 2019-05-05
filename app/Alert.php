<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $guarded = [];
	
    public function owner(){
		return $this->belongsTo(User::class);
	} //func
} //class
