<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;

class WelcomeController extends Controller
{
    public function showPage(){
    	
    	
    	$jobs = Job::all();

    	//dd($jobs);

    	return view('welcome')->withJobs($jobs);
    } //func
}//class
