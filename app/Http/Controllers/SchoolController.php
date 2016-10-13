<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\School;
use App\Schcomment;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::orderBy('created_at', 'desc')->where('enable','=',1)->get();;

        return view('school.index')->withSchools($schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
        $user = Auth::user();
            return view('school.addclass');
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $school = new School;
        $school->user_id = $user->id;
        $school->school_name = $request->schoolname;
        $school->school_date = $request->school_date;
        $school->intro = $request ->school_intro;
        $school->address = $request->schooladdress;
        $school->money = $request->money;
        $school->ingredient = $request->ingredient;
        $school->warnning = $request->warnning;
        $school->discount = $request->discount;
        $school->stopdate = $request->stopdate;
        $school->people = $request->people;




        $file = $request->file('school_pic');
    $extension = $file->getClientOriginalExtension();
    $file_name = strval(time()).str_random(5).'.'.$extension;
    $school->img_url = $file_name;

    $destination_path = public_path().'/schoolpic-upload/';
        $upload_success = $file->move($destination_path, $file_name);
    
        $school ->save();
        return redirect()->route('school.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $school =School::where('id','=',$id)->get();
        $comments = Schcomment::where('school_id','=',$id)->orderBy('created_at', 'desc')->get();

        return view('school.intro')->with('schools',$school)->withUser($user)->with('comments',$comments);
    
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function join(Request $request)
    {

        return 'haha';
    }
}
