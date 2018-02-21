<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Task;
use App\Comment;
use App\Mail;
use App\Schcomment;
use App\School;
class CommentController extends Controller
{


    public function foodcomment(Request $request){

        

        
    	$user = Auth::user();
        
    	$comment = new Comment;
    	$comment->task_id = $request->task_id;
    	$comment->user_id = $user->id;
    	$comment->content = $request->comment;
    	$comment->save();
        $commenters = Comment::distinct()->select('user_id')->where('task_id','=',$request->task_id)->get();
        //dd($commenters);
        foreach ($commenters as $com ) {
            if($user->id!=$com->user_id&&$request->user_id!=$com->user_id){ //不要寄給自己和文章主人
                $mail=new Mail();
                $mail->sender = $user->id;
                $mail->sender_name = $user->name;
                $temp=Task::find($request->task_id);
                $mail->reciever = $com->user_id;
                $mail->type = '留言';
                $mail->text = $user->name.'回覆了'.$temp->name.'的留言';
                $mail->task_id = $request->task_id;
                $mail->save();    
        }
    }
        if($request->user_id!=$user->id){
                $mail=new Mail();
                $mail->sender = $user->id;
                $mail->sender_name = $user->name;
                $temp=Task::find($request->task_id);
                $mail->reciever = $temp->user_id;
                $mail->type = '留言';
                $mail->text = $user->name.'在'.$temp->name.'底下留言';
                $mail->task_id = $request->task_id;
                $mail->save();
            }
    	$comments =Comment::where('task_id','=',$request->task_id)->orderBy('created_at', 'desc')->take(1)->get();
    	
    	return redirect()->route('tasks.show',$request->task_id);
    
    }

    public function schoolcomment(Request $request){
        $user = Auth::user();
        $comment = new Schcomment;
        $comment->school_id = $request->task_id;
        $comment->user_id = $user->id;
        $comment->content = $request->comment;
        $comment->save();
        $commenters = Schcomment::distinct()->select('user_id')->where('school_id','=',$request->task_id)->get();
        foreach ($commenters as $com ) {
            if($user->id!=$com->user_id&&$request->user_id!=$com->user_id){
                $mail=new Mail();
                $mail->sender = $user->id;
                $mail->sender_name = $user->name;
                $temp=School::find($request->task_id);
                $mail->reciever = $com->user_id;
                $mail->type = '課程留言';
                $mail->text = $user->name.'回覆了'.$temp->school_name.'的留言';
                $mail->task_id = $request->task_id;
                $mail->save();    
            }
        }
        if($request->user_id!=$user->id){
        $mail=new Mail();
                $mail->sender = $user->id;
                $mail->sender_name = $user->name;
                $temp=School::find($request->task_id);
                $mail->reciever = $temp->user_id;
                $mail->type = '課程留言';
                $mail->text = $user->name.'在'.$temp->school_name.'底下留言';
                $mail->task_id = $request->task_id;
                $mail->save();
            }
        return redirect()->route('school.show',$request->task_id);
    
    }

}
