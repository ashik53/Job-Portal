<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alert;
class AlertController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } //construct

    public function index()
    {
        $alerts = Alert::where('owner_id', auth()->id())
                       ->orderBy('id', 'DESC')
                       ->get();

        //dd($reversed);

        return view('alert.alerts_all')->withAlerts($alerts);

    }//func

	public function destroy(Alert $alert)
    {
        
        $alert->delete();

        return redirect('/alerts');
    } //func

}//class
