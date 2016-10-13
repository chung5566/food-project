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
use App\Announce;

use Auth;
use DB;

class CmsController extends Controller
{
    
    public function index()
    {
        $task =Task::get();
        $member =User::get();
        $school1 =School::where('enable','=','0')->get();
        $school2 =School::where('enable','=','1')->get();
        $announces=Announce::get();

        return view('cms.dashboard')->withTask($task)->withMember($member)->withSchool1($school1)->withSchool2($school2)->withAnnounces($announces);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $announces = new Announce ();
        $announces->name = $request->name;
        $announces->content = $request->content;
        $announces->save ();
            return response ()->json ( $announces );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                return 'ha';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $announces = Announce::find ($request->id );
        $announces->name = $request->name;
        $announces->content = $request->content;

        $announces->save ();
        return response ()->json ( $announces );
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
            Announce::find ( $request->id )->delete ();
        return response ()->json ();    

    }
    public function statistic(){

        return view('cms/statistic.index'); 
    }
}
