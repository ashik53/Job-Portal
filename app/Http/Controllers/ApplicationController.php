<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\User;
use App\Job;
use App\Application;
use App\Alert;
use App\Mail\ApprovedInterviewRequest;

class ApplicationController extends Controller
{
    public function applyJob($job_id, $user_id){

    	
        $current_user = User::findOrFail(auth()->id());

        if($current_user->role < 3){
            abort(403);
        }


    	$user = User::find($user_id);
    	//insert a record in application table
    	$job = Job::find($job_id);

    	$application = new Application();
    	$application->job_id = $job->id;
    	$application->user_id = $user->id;

    	$application->save();

    	Session::flash('success', 'Successfully applied for this job');

        return redirect("jobs/$job_id");    
    } //func 


    public function cancelJobApplication($job_id, $user_id){

        $current_user = User::findOrFail(auth()->id());

        if($current_user->role == 1){
            abort(403);
        }


    	$user = User::find($user_id);
    	

    	//delete the job entry
    	$job = Job::find($job_id);
    	$job_entry = Application::where('job_id', $job->id)
                        		 ->where('user_id', auth()->id())
                        		 ->first();
        //dd($job_entry);
                        		 
        $job_entry->delete();


       // return redirect()->route('jobs.show', $job_id);

        return redirect("jobs/$job_id");

    } //func

    //for alumni who posted a job

    public function showAllApplications($job_id){
        
        // find the current authenticated users
        $user = User::find(auth()->id());

        //get all the applications associated with this job id
        $applications = Application::where('job_id', $job_id)
                                 ->get();
        
        //find the job details of a specific job id
        $job = Job::findOrFail($job_id);
        $job_title = $job->title;
        $job_serial = $job->id;
        //now its time to get all user's info who applied for this job
        //firstly, we need to declare an array for storing all user Infos                         
        $userCollections = collect();
        
        //now loop through all applications' records and get the user_id, the search the user_id in the User table
        foreach($applications as $app){
            if($app->status == 0) $userCollections->add(User::findOrFail($app->user_id)); 
        }//loop                      

        //only admin, and job owner (alumni) can view the route
        

        //dd($userCollections);
        return view('job.all_job_applications')->withSerial($job_serial)->withTitle($job_title)->withUsers($userCollections)->withJobOwner($job->owner_id);

    } //func


     public function acceptInterviewRequest($job_id, $user_id){
        
        $user = User::findOrFail($user_id);

        $application = Application::where('job_id', $job_id)
                                  ->where('user_id', $user_id)
                                  ->first();
    
        $application->status = 1;
        $application->save();

        $alert = new Alert();
        $alert->type = 2;
        $alert->owner_id = $user_id;

        $alert->save();

        \Mail::to($user->email)->send(

            new ApprovedInterviewRequest()

        );

        return redirect("applications/$job_id");
    } //func

    public function deleteInterviewRequest($job_id, $user_id){
        
        $application = Application::where('job_id', $job_id)
                                  ->where('user_id', $user_id)
                                  ->first();
    
        $application->delete();

        return redirect("applications/$job_id");
    } //func
    
    public function allJobInterviewCalls($job_id){

        $applications = Application::where('job_id', $job_id)
                                   ->where('status', 1)
                                   ->get();

        $users = collect();
        $job = Job::findOrFail($job_id);

        foreach($applications as $app){
            $users->add(User::findOrFail($app->user_id));
        } //func

        return view('job.all_interview_calls_for_single_job')->withUsers($users)->withApplications($applications)->withJob($job);


    }//func
    public function showInterviewCalls(){

        $applications = Application::where('user_id', auth()->id())
                                   ->where('status', 1)
                                   ->get();

        $jobCollections = collect();
          
        $userCollections = array();
        
         foreach($applications as $app){
            $jobCollections->add(Job::findOrFail($app->job_id));
            $userCollections[] = User::findOrFail($app->user_id);
         } //

         //dd($jobCollections);

         return view('job.all_jobs')->withJobs($jobCollections)->withUsers($userCollections);


    } //func



} //class
