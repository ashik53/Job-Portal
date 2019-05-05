<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;
use App\Application;
use App\Comment;
use Session;
use Illuminate\Database\Eloquent\Collection;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
    	$this->middleware('auth', ['except' => ['index', 'show'] ]);
    } //construct

    //show all jobs
    public function index()
    {
        //
        $jobs = Job::orderBy('id', 'DESC')->paginate(6);

        $userCollections = array();
        
        //
        foreach($jobs as $job){
            $userCollections[] = User::findOrFail($job->owner_id); 
        }//loop

        return view('job.all_jobs')->withJobs($jobs)->withUsers($userCollections);

    } //func

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
    	$user = User::findOrFail(auth()->id());

    	if($user->role !=2)  {
            abort(403);
        } 
        return view('job.add_jobs');
    } //func

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, array( /* this keyword is a must use validate() function */

            'title' => 'required|max:500|min:3',
            'description'  => 'required|min:10|max:10000',
            'company'  => 'required|min:5|max:255',
            'requirements'  => 'required|min:5|max:255',
            'salary'  => 'required|min:4|max:255',
            'experience' =>'required|numeric',
            'deadline'  => 'required|date',
            
        ));


        $job = new Job();

        $job->title = $request->title;
        $job->description = $request->description;
        $job->company = $request->company;
        $job->requirements = $request->requirements;
        $job->experience = $request->experience;
    	$job->salary = $request->salary;
    	$job->deadline = $request->deadline;
    	$job->owner_id = auth()->id();

    	$job->save();

    	Session::flash('success', 'Job post is created successfully');

    	return redirect()->route('jobs.show', $job->id);

    } //func

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        $user = User::findOrFail($job->owner_id);

        //find that this authenticated user applied for this job or not
        $application = Application::where('job_id', $job->id)
                        ->where('user_id', auth()->id())
                        ->first();
        //dd($application->user_id);
        $comments = Comment::where('job_id', $job->id)
                            ->orderBy('id', 'DESC')->get();
        $commentors = collect();

        foreach($comments as $comment){
            $commentors->add(User::findOrFail($comment->owner_id));
        }// 
                            
        return view('job.individual_job_post')->withJob($job)->withOwner($user)->withApplication($application)->withComments($comments)->withCommentors($commentors);
    }// func

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Job::findOrFail($id);
        //dd($work->title);
        return view('job.edit_job')->withWork($work);
    }//func

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);

        $this->validate($request, array( /* this keyword is a must use validate() function */

            'title' => 'required|min:3',
            'description'  => 'required|min:10|max:10000',
            'company'  => 'required|min:5|max:255',
            'requirements'  => 'required|min:5|max:255',
            'salary'  => 'required|min:4|max:255',
            'experience' =>'required|numeric',
            'deadline'  => 'required|date',
            
        ));

        
        $job = Job::findOrFail($id);
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->company = $request->input('company');
        $job->requirements = $request->input('requirements');
        $job->experience = $request->input('experience');
        $job->salary = $request->input('salary');
        $job->deadline = $request->input('deadline');

        $job->save();


        Session::flash('success', 'Job post updated successfully');

        return redirect()->route('jobs.show', $job->id);

       
    } //function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');

    } //func

    public function myAppliedJobs(){
         
        $applications = Application::where('user_id', auth()->id())->get();

        $jobCollections = collect();
          
        $userCollections = array();
        
        foreach($applications as $app){
            
            $job = Job::findOrFail($app->job_id);
            $jobCollections->add($job);

            $userCollections[] = User::findOrFail($job->owner_id);
        } //


         //dd($jobCollections);

         return view('job.all_jobs')->withJobs($jobCollections)->withUsers($userCollections);

    }//func

     public function myPostedJobs(){
         
        $jobs = Job::where('owner_id', auth()->id())->get();


        return view('job.posted-jobs')->withJobs($jobs);

    }//func

    
   
}//class
