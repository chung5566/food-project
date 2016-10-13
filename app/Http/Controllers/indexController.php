<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use Auth;
use App\Storerandom;
use DB;
use App\School;
use App\Announce;
use App\Mail;
class indexController extends Controller
{
    public function index(){

    	$newtasks = Task::orderBy('created_at', 'desc')->take(6)->get();

    	$hottasks = Task::orderBy('popular', 'desc')->take(6)->get();

    	$ramtasks = Task::orderByRaw("RAND()")->take(6)->get();

    	$ramfood = Task::orderByRaw("RAND()")->take(4)->get();

    	$topusers = User::orderBy('point','desc')->take(10)->get();

        $announces = Announce::orderBy('created_at','desc')->take(6)->get();

        $schools = School::where('enable','=',1)->orderBy('created_at', 'desc')->take(10)->get();
    	return view('welcome')->withNewtasks($newtasks)->withHottasks($hottasks)->withRamtasks($ramtasks)
    	->withRamfood($ramfood)->withTopusers($topusers)->withSchools($schools)->withAnnounces($announces);
    }

    public function selectstyle(Request $request){

    	$selectfood = Task::orwhere('style_1','=',$request->style_1)->orwhere('style_2','=',$request->style_2)->orwhere('style_3','=',$request->style_3)->orderBy('created_at', 'desc')->take(6)->get();
        return response()->json($selectfood);
    }
    public function chooserandomfood(){

        $ramfood = Task::orderByRaw("RAND()")->take(4)->get();
        return response()->json($ramfood);
    }
    public function storerandomfood(Request $request){

        if (Auth::check()) {
        $user = Auth::user();
        $storerandomfood = new Storerandom;
        $storerandomfood->task_1 = $request ->ramid_1;
        $storerandomfood->task_2 = $request ->ramid_2;
        $storerandomfood->task_3 = $request ->ramid_3;
        $storerandomfood->task_4 = $request ->ramid_4;
        $storerandomfood->user_id = $user->id;
        $storerandomfood->save();

        }
        else{
            return 'notauth';
        }

        
    }
    public function checked(Request $request){
    
    $checked = Mail::where('reciever','=',$request->id)->where('checked','=',0)->get();
    foreach($checked as $c){
        $c->checked=1;
        $c->save();

    }
    return 1;
}
}
