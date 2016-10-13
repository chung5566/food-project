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
use Auth;
use DB;


class CmsSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools =School::where('enable','=','0')->get();
        return view('cms/school.indexdeny')->withSchools($schools);
    }

    public function index_agree()
    {
        $schools =School::where('enable','=','1')->get();
        return view('cms/school.indexagree')->withSchools($schools);
    }

    public function agree(Request $request){

        $school = School::find ( $request->id );
        $school->enable = 1;
        $school->save();

    }

    public function deny(Request $request){

        $school = School::find ( $request->id );
        $school->enable = 0;
        $school->save();

    }

    
    public function destroydeny(Request $request)
    {
        School::find ( $request->id )->delete ();
        return response ()->json ();
    }
    public function create()
    {
        //
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
}
