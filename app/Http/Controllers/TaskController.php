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
use Auth;
use DB;
use App\Repositories\TaskRepository;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();

        return view('tasks.index')->withTasks($tasks);
    }

    public function index_search(Request $request)
    {
        $tasks = Task::where('name','like','%'.$request->name.'%')->get();

        return view('tasks.index')->withTasks($tasks);
    }

    public function addFoodp(){

        return view('tasks.addfood_p');

    }

    public function addFoodv(){

        return view('tasks.addfood_v');

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


$task = new Task;
if($request->task_type=='p'){
        $this->validate($request, [
        'name' => 'required|max:20',
        'food_pic' => 'required|image',
        'cooktime' => 'required|integer',
        'portion' => 'required|integer',
    ]);



    $file = $request->file('food_pic');
    $extension = $file->getClientOriginalExtension();
    $file_name = strval(time()).str_random(5).'.'.$extension;

    $destination_path = public_path().'/foodpic-upload/';


$task->user_id = $request->user()->id;
$task->name = $request->name;
$task->article_type = $request->task_type;
$task->cooktime = $request->cooktime;
$task->portion = $request->portion;
$task->shortintro = $request->shortintro;
$task->tip = $request->tip;
$task->style_1 = $request->style_1;
$task->style_2 = $request->style_2;
$task->style_3 = $request->style_3;





$task->img_url = $file_name;
$task->save();
$user = Auth::user();
$user->point +=10;
$request->input('ingridient');
foreach ($request->input('ingridient') as $key => $ingredient) {
    
$food = new Ingredient;
$food->name = $ingredient;
$food->quantity = $request->quantity[$key];
$food->task_id = $task->id;
$food->save();
}

foreach ($request->input('intro') as $key => $step) {
    $food = new Step;
     if($request->hasFile('img_url.'.$key)) {
      $file2 = $request->file('img_url.'.$key);
    $extension = $file2->getClientOriginalExtension();
    $file_name2 = strval(time()).str_random(5).'.'.$extension;

    $destination_path2 = public_path().'/step-upload/';
    $food->img_url = $file_name2;
    $upload_success = $file2->move($destination_path2, $file_name2);

    }


$food->text = $step;
$food->task_id = $task->id;

$food->save();


}
    if ($request->hasFile('food_pic')) {
        $upload_success = $file->move($destination_path, $file_name);
    }   


}   
 

elseif($request->task_type=='v'){
        $this->validate($request, [
        'name' => 'required|max:20',
        'cooktime' => 'required|integer',
        'portion' => 'required|integer',
    ]);



/*
$ingredientss = $request->ingredients;
foreach ($ingredientss as $key => $ingredient) {
    $ingredients = new Ingredient;
    $ingredients->name = $ingredient;

    
    $task->ingredients()->save($ingredients);
}*/

/*foreach($request->ingredients as $key=> $ingredient){
$ingredients = new Ingredient;
$ingredients->name = $ingredient;
//$ingredientss->quantity = $request->quantity[$key];
$ingredients->create();
//$ingredientandtask = new Task;
//$ingredientandtask->ingredients()->save($ingredients);
}*/

$task->user_id = $request->user()->id;
$task->name = $request->name;
$task->article_type = $request->task_type;
$task->cooktime = $request->cooktime;
$task->portion = $request->portion;
$task->shortintro = $request->shortintro;
$task->tip = $request->tip;
$regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/';
preg_match($regExp,$request->video_url,$match);

$task->video_url=$match[2];
$task->img_url = 'http://img.youtube.com/vi/'.$match[2].'/0.jpg';

$task->style_1 = $request->style_1;
$task->style_2 = $request->style_2;
$task->style_3 = $request->style_3;



$task->save();
$user = Auth::user();
$user->point +=15;
$user->save();
$request->input('ingridient');
foreach ($request->input('ingridient') as $key => $ingredient) {
$food = new Ingredient;
$food->name = $ingredient;
$food->quantity = $request->quantity[$key];
$food->task_id = $task->id;
$food->save();
}   


}
        return redirect()->route('tasks.show',$task->id);
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
        $task = Task::find($id);
//dd($task);
        $ingredients=Ingredient::where('task_id','=',$id)
        ->get();
        
        $steps= Step::where('task_id','=',$id)
        ->get();
        if (Auth::check()){
        $collect=Collect::where("task_id",$id)->where("user_id",$user->id)->get();
        $recommand=Recommand::where("task_id",$id)->where("user_id",$user->id)->get();

        }
        else{
        $collect='' ;
        $recommand=Recommand::where('task_id','=',$id);
        }




        //dd($task->article_type);
        //dd($user);
        //dd($collect);
        DB::table('tasks')
            ->where('id','=',$id)
            ->increment('popular');
        $comments = Comment::where('task_id','=',$id)->orderBy('created_at', 'desc')->get();

        if ($task->article_type == 'p'){

        return view('tasks.intro_p')->with('task',$task)->withIngredients($ingredients)->withSteps($steps)->withCollect($collect)->withUser($user)->withComments($comments)
        ->withRecommand($recommand);
        }
        elseif($task->article_type == 'v'){
        return view('tasks.intro_v')->with('task',$task)->withIngredients($ingredients)->withUser($user)->withCollect($collect)->withComments($comments)
        ->withRecommand($recommand);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $task = Task::find($id);
        $ingredients=Ingredient::where('task_id','=',$id)
        ->get();
        if ($task->article_type=='p'){
            $steps= Step::where('task_id','=',$id)
        ->get();
            return view('tasks.edit_p')->with('task',$task)->withIngredients($ingredients)->withSteps($steps);
        }
        else

            return view('tasks.edit_v')->with('task',$task)->withIngredients($ingredients);
        
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
$task = Task::find($id);
if($request->task_type=='p'){
        $this->validate($request, [
        'name' => 'required|max:20',
        'cooktime' => 'required|integer',
        'portion' => 'required|integer',
    ]);


    if ($request->hasFile('food_pic')) {

    $file = $request->file('food_pic');
    $extension = $file->getClientOriginalExtension();
    $file_name = strval(time()).str_random(5).'.'.$extension;

    $destination_path = public_path().'/foodpic-upload/';
    $task->img_url = $file_name;

    }   

$task->name = $request->name;
$task->article_type = $request->task_type;
$task->cooktime = $request->cooktime;
$task->portion = $request->portion;
$task->shortintro = $request->shortintro;
$task->tip = $request->tip;
$task->style_1 = $request->style_1;
$task->style_2 = $request->style_2;
$task->style_3 = $request->style_3;





$task->save();
$user = Auth::user();
$user->point +=10;
$request->input('ingridient');
foreach ($request->input('ingridient') as $key => $ingredient) {
    
$food = Ingredient::where('task_id','=',$id)->update([name => $ingredient]);
$food->name = $ingredient;
$food->quantity = $request->quantity[$key];
$food->task_id = $task->id;
$food->save();
}

foreach ($request->input('intro') as $key => $step) {
    $food = new Step;
     if($request->hasFile('img_url.'.$key)) {
      $file2 = $request->file('img_url.'.$key);
    $extension = $file2->getClientOriginalExtension();
    $file_name2 = strval(time()).str_random(5).'.'.$extension;

    $destination_path2 = public_path().'/step-upload/';
    $food->img_url = $file_name2;
    $upload_success = $file2->move($destination_path2, $file_name2);

    }


$food->text = $step;
$food->task_id = $task->id;

$food->save();


}
    if ($request->hasFile('food_pic')) {
        $upload_success = $file->move($destination_path, $file_name);
    }   


}   
 

elseif($request->task_type=='v'){
        $this->validate($request, [
        'name' => 'required|max:20',
        'cooktime' => 'required|integer',
        'portion' => 'required|integer',
    ]);


$task->user_id = $request->user()->id;
$task->name = $request->name;
$task->article_type = $request->task_type;
$task->cooktime = $request->cooktime;
$task->portion = $request->portion;
$task->shortintro = $request->shortintro;
$task->tip = $request->tip;
$regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/';
preg_match($regExp,$request->video_url,$match);

$task->video_url=$match[2];
$task->img_url = 'http://img.youtube.com/vi/'.$match[2].'/0.jpg';

$task->style_1 = $request->style_1;
$task->style_2 = $request->style_2;
$task->style_3 = $request->style_3;



$task->save();
$user = Auth::user();
$user->point +=15;
$user->save();
$request->input('ingridient');
foreach ($request->input('ingridient') as $key => $ingredient) {
$food = new Ingredient;
$food->name = $ingredient;
$food->quantity = $request->quantity[$key];
$food->task_id = $task->id;
$food->save();
}   


}
        return redirect()->route('tasks.show',$task->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find ( $id )->delete ();
        return redirect()->action('userController@selfintro');
    }
}
