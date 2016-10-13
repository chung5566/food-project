<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use App\Ingredient;
use App\Step;
use App\Collect;
use App\Comment;
use App\Recommand;
use App\School;
use App\Mail;
use Auth;
use DB;

class CmsMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members =User::get();
        return view('cms/member.index')->withMembers($members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

	public function mailtomember(Request $request){
		$mail=new Mail();
                $mail->sender = 'admin';
                $mail->sender_name = 'admin';
                $mail->reciever = $request->recipient_id;
                $mail->type = 'ºÞ²z­û';
                $mail->text = $request->message;
                $mail->save();
                
                return redirect('cms/cms_member');
		}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $member = User::find ( $request->id );
        $member->name = $request->name;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->birth = $request->birth;
        $member->country = $request->country;
        $member->identity = $request->identity;
        $member->selfintro = $request->selfintro;
        $member->point = $request->point;
        $member->save ();
        return response ()->json ( $member );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        Task::find ( $request->id )->delete ();
        return response ()->json ();
    }
}
