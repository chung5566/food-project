<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Task;
use App\Collect;
use App\Follower;
use App\Storerandom;

use DB;

class userController extends Controller
{

	public function index(){
		$user = Auth::user();


		return view('member.selfset')->with('user',$user);
	}

    public function selfintro(){
        $user = Auth::user();
        $tasks = Task::where('user_id','=',$user->id)->orderBy('created_at', 'desc')
        ->get();
        //$collect = Collect::join('tasks','collects.task_id','=','tasks.id')->join('users','collects.user_id','=','users.id')
        //->where('users.id','=',$user->id)->select('task.name as task_name')->get();
        $collect = User::where('users.id','=',$user->id)->join('collects','users.id','=','collects.user_id')->join('tasks','collects.task_id','=','tasks.id')
        ->select('tasks.*')->orderBy('created_at', 'desc')->get();
        //dd($collect);
        $storeran = Storerandom::where('user_id','=',$user->id)->orderBy('created_at', 'desc')->get();
        $followers = Follower::where('user_id','=',$user->id)->join('users','follow_id','=','users.id')->select('users.*')->orderBy('followers.created_at', 'desc')->get();
        $fans = Follower::where('follow_id','=',$user->id)->count();
        //dd($followers->follower);
        return view('member.selfintro')->with('user',$user)->withTasks($tasks)->withCollect($collect)->withFollowers($followers)->withStorerans($storeran)->withFans($fans);
    }


    public function userchange(Request $request){
    	$user = Auth::user();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->gender = $request->gender;
    	$user->birth = $request->birth;
    	$user->country = $request->country;
    	$user->save();
    	return view('member.selfset')->withUser($user);

    }

    public function userchangepic(Request $request){
    $user = Auth::user();
    $file = $request->file('user_pic');
    $extension = $file->getClientOriginalExtension();
    $file_name = strval(time()).str_random(5).'.'.$extension;

    $destination_path = public_path().'/user-upload/';
    $user->user_img = $file_name;
	$user->save();

    if ($request->hasFile('user_pic')) {
        $upload_success = $file->move($destination_path, $file_name);
    }   
    return view('member.selfset')->withUser($user);
}
 public function userchangeintro(Request $request){
    $user = Auth::user();
    $user->selfintro = $request->self_intro;
    $user->save();

    return view('member.selfset')->withUser($user);
}
}