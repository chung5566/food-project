<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use App\Collect;
use App\Follower;

use Auth;

class MemberController extends Controller
{
	public function show($id)
    {
        $user = Auth::user();
    	$member = User::where('id','=',$id)
    	->get();
    	$tasks = Task::where('user_id','=',$id)->orderBy('created_at', 'desc')
    	->get();
    	//$collect = Collect::join('tasks','collects.task_id','=','tasks.id')->join('users','collects.user_id','=','users.id')
        //->where('users.id','=',$id)->get();
        $collect = User::where('users.id','=',$id)->join('collects','users.id','=','collects.user_id')->join('tasks','collects.task_id','=','tasks.id')
        ->select('tasks.*')->orderBy('created_at', 'desc')->get();
    	//dd($collect);
        //dd($member);
        $fans = Follower::where('follow_id','=',$id)->count();
        $follower = User::where('users.id','=',$id)->join('followers','users.id','=','followers.follow_id')->get();
        return  view('member.intro')->with('member',$member)->with('tasks',$tasks)->with('collect',$collect)->with('user',$user)
        ->with('follower',$follower)->with('fans',$fans);

    }
}
