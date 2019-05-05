<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Notification extends Model
{

	protected $guarded = [];
	
    public function owner(){
		return $this->belongsTo(User::class);
	} //func
} //class
