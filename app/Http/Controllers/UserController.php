<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Job;
use App\Alumni;
use Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}//func
    public function showPage(){
    	return view('Auth.passwords.password_change');
    }//func

    public function changePassword(Request $request){
    	
    	$user = User::findOrFail(auth()->id());


    	if(Hash::check($request->old_password, $user->password) == false){
    		 return Redirect()->back();
    	}

    	$this->validate($request, array( 
            'password' => "required|string|max:20|min:5",
            'password_confirmation'  => "required|string|max:20|min:5|same:password",
        ));

    	
		
    	//dd($password);

		User::where("id", '=',  auth()->id())
			 ->update(['password'=> Hash::make($request->password)]);

    	Session::flash('success', 'Successfully changed the password');

    	return redirect("/profiles/$user->id");
    }//func

    public function seeDashboard(){

        $students = User::where('role', 3)->get();
        $alumnis =  User::where('role', 2)->get();
        $jobs = Job::all();

        return view('admin.dashboard')->withStudents($students)->withAlumnis($alumnis)->withJobs($jobs);

    }//func

    public function deleteUser($user_id){

        $current_user = User::findOrFail(auth()->id());

        if($current_user->role != 1) abort(403);

        $deletd_user =  User::findOrFail($user_id);
        $role = $deletd_user->role;

        $deletd_user->delete();

        return redirect("/show-all/$role");

    }//func

    public function denoteToStudent($user_id){

        $current_user = User::findOrFail(auth()->id());

        if($current_user->role != 1) abort(403);

        $denoted_user =  User::findOrFail($user_id);
        $old_role = $denoted_user->role;
        $denoted_user->role = 3;

        $denoted_user->save();

        //delete a record from alumni table
        $alumni = Alumni::where('user_id', $user_id)->first();

        if(is_null($alumni) == false) {
            $alumni->delete();
        }

        

        return redirect("/show-all/$old_role");

    }//func

    public function searchByKeyword(Request $request){
        
        


        $keyword = $request->key;
        $users = User::where('first_name', 'LIKE', "%{$keyword}%")
                      ->orWhere('last_name', 'LIKE', "%{$keyword}%")
                      ->get();
                      

        return view('stackholders.search_by_name')->withUsers($users)->withKey($keyword);

    
    }//func

}//class
