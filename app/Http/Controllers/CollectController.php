<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Task;
use APP\User;
use App\Collect;
use App\Mail;

class CollectController extends Controller
{

    public function collect(Request $request){

    
        $user = Auth::user();

        if($request->has("task_id")){
 
            $task_id=$request->task_id;
            if(Collect::where("task_id",$task_id)->where("user_id",$user->id)->count()>0){

                Collect::where("task_id",$task_id)->where("user_id",$user->id)->delete();
                return response()->json(array("result"=>"1","isunlike"=>"0","text"=>"收藏"));
            }
            else{
                $like=new Collect();
                $like->user_id=$user->id;
                $like->task_id=$task_id;
                $like->save();
                $mail=new Mail();
                $mail->sender = $user->id;
                $mail->sender_name = $user->name;
                $temp=Task::find($request->task_id);
                $mail->reciever = $temp->user_id;
                $mail->type = '收藏';
                $mail->text = $user->name.'收藏了'.$temp->name;
                $mail->task_id = $request->task_id;
                $mail->save();
            return response()->json(array("result"=>"1","isunlike"=>"1","text"=>"取消收藏"));
            }
            return response()->json(array("result"=>"1","isunlike"=>"1","text"=>"取消收藏"));
        }
        else{
            return response()->json(array("result"=>"0"));
        }
    }
}

