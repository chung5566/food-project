<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Recommand;
use App\Mail;
use App\Task;
class RecommandController extends Controller
{
       public function food_recommand(Request $request){

         $user = Auth::user();

        if($request->has("task_id")){
 
            $task_id=$request->task_id;
            if(Recommand::where("task_id",$task_id)->where("user_id",$user->id)->count()>0){

                Recommand::where("task_id",$task_id)->where("user_id",$user->id)->delete();
                return response()->json(array("result"=>"1","isunlike"=>"0","text"=>"推薦"));
            }
            else{
                $mail=new Mail();
                $mail->sender = $user->id;
                $mail->sender_name = $user->name;
                $temp=Task::find($task_id);
                $mail->reciever = $temp->user_id;
                $mail->type = '推薦';
                $mail->text = $user->name.'覺得'.$temp->name.'很讚';
                $mail->task_id = $request->task_id;
                $mail->save();
                $like=new Recommand();
                $like->user_id=$user->id;
                $like->task_id=$task_id;
                $like->save();
            return response()->json(array("result"=>"1","isunlike"=>"1","text"=>"取消推薦"));
            }
            return response()->json(array("result"=>"1","isunlike"=>"1","text"=>"取消推薦"));
        }
        else{
            return response()->json(array("result"=>"0"));
        }
}
}
