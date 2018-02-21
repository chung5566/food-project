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
use App\Season;
use Auth;
use DB;

class CmsTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ss = Season::get();
        $q=array();
        foreach ($ss as $key => $value) {
        array_push($q, $value->task_id);
        }
        $seasons = Task::whereIn('id',$q)->get();
        
        $tasks = Task::whereNotIn('id',$q)->orderBy('created_at', 'desc')->get();
        return view('cms/task.index')->withTasks($tasks)->withSeasons($seasons);
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
    public function destroy(Request $request)
    {
        Task::find ( $request->id )->delete ();
        return response ()->json ();
    }

    public function destroycomment(Request $request)
    {
        Comment::find ( $request->id )->delete ();
        return response ()->json ();

    }
    public function recommand_food(Request $request){
        $user = Auth::user();

        if($request->has("recommand_food")){
 
            $recommand_id=$request->recommand_food;
            if(Season::where("task_id",$recommand_id)->count()>0){

                Season::where("task_id",$recommand_id)->delete();
                return response()->json(array("result"=>"1","isunlike"=>"0","text"=>"推薦"));
            }
            else{
                $like=new Season();
                $like->task_id=$request->recommand_food;
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
