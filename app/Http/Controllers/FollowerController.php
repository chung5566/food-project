<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Task;
use APP\User;
use App\Collect;
use App\Follower;

class FollowerController extends Controller
{
    public function follower(Request $request){

    
        $user = Auth::user();

        if($request->has("follow_id")){
 
            $follow_id=$request->follow_id;
            if(Follower::where("follow_id",$follow_id)->where("user_id",$user->id)->count()>0){

                Follower::where("follow_id",$follow_id)->where("user_id",$user->id)->delete();
                return response()->json(array("result"=>"1","isunlike"=>"0","text"=>"追蹤"));
            }
            else{
                $like=new Follower();
                $like->user_id=$user->id;
                $like->follow_id=$follow_id;
                $like->save();
            return response()->json(array("result"=>"1","isunlike"=>"1","text"=>"取消追蹤"));
            }
            return response()->json(array("result"=>"1","isunlike"=>"1","text"=>"取消追蹤"));
        }
        else{
            return response()->json(array("result"=>"0"));
        }
    }
}
