<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Alumni;
use App\Req;
use App\Alert;
use Auth;
use App\Mail\ApprovedAlumniRequest;
use Session;

class AlumniController extends Controller
{
     
    public function showAlumniRequests(){

        $user = User::findOrFail(auth()->id());

        if($user->role!= 1){
            abort(403);
        }


        $reqs = Req::paginate(8);
        $userCollections = array();
        
        //
        foreach($reqs as $req){
            $userCollections[] = User::findOrFail($req->user_id); 
        }//loop

        return view('alumni-actions.alumni_request')->withUsers($userCollections);
    }//func

    public function applyForAlumni(){
    	
        $current_user = User::findOrFail(auth()->id());

        if($current_user->role!= 3){
            abort(403);
        }

        $get = Req::find(auth()->id());
        
        if(is_null($get)){ 
    	   $apply = new Req();
    	   $apply->user_id = auth()->id();
    	   $apply->save();
           Session::flash('success', 'You application is submitted, wait for approval');
        } //
    	

    	//return view('alumni_actions.alumni_requests')->with
        return redirect('get-form')->with(auth()->id());
    }//func



    public function showAlumniForm(){

        $current_user = User::findOrFail(auth()->id());

        if($current_user->role!= 3){
            abort(403);
        }

        $user = Req::where('user_id', auth()->id())->first();


    	return view('alumni-actions.alumni_form')->withUser($user);
    }//func

    public function acceptAlumniRequest($user_id){
        
        $current_user = User::findOrFail(auth()->id());

        if($current_user->role!= 1){
            abort(403);
        }


        $user = User::findOrFail($user_id);
        $user->role = 2;
        $user->save();

        //send mail

        \Mail::to($user->email)->send(

            new ApprovedAlumniRequest()

        );

        //make a record on alumni table

        $alumni = new Alumni();
        $alumni->user_id = $user->id;

        $alumni->save();




        Session::flash('success','Successfully accepted an student as an alumni');
        //Session::flash('success', 'Job post is created successfully');

        //created notification
        $alert = new Alert();
        $alert->type = 1;
        $alert->owner_id = $user_id;

        $alert->save();

        return redirect("delete-req/$user->id");


    } //func

    public function deleteAlumniRequest($user_id){

        $current_user = User::findOrFail(auth()->id());

        if($current_user->role!= 1){
            abort(403);
        }

       // dd('inside delete func');

        


        $req = Req::where('user_id', $user_id)->first();

        if(is_null($req) == false) { 

            $req->delete();

            return redirect('show-reqs');
        }

        return back();

    }//func


} //class
