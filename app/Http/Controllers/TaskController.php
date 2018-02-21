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
use App\Mail;
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

$task->style_1 = implode(",",$request->style_1);
$task->style_2 = implode(",",$request->style_2);
$task->style_3 = implode(",",$request->style_3);





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
if (strpos($request->video_url, 'youtube') != false){

  $regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/';
  preg_match($regExp,$request->video_url,$match);
  $task->video_url='www.youtube.com/embed/'.$match[2];
  $task->img_url = 'http://img.youtube.com/vi/'.$match[2].'/0.jpg';
}
elseif (strpos($request->video_url, 'facebook') != false) {
  $task->video_url = 'www.facebook.com/plugins/video.php?href='.rawurlencode($request->video_url);
  preg_match("~(?:t\.\d+/)?(\d+)~i", $request->video_url, $matches);
  //str_replace('/videos/', '', $matches[0]);
  $task->img_url = 'https://graph.facebook.com/'.$matches[0].'/picture';
}
else {
  $task->video_url = $request->video_url;
  $task->video_type = 'other';
}

$task->style_1 = implode(",",$request->style_1);
$task->style_2 = implode(",",$request->style_2);
$task->style_3 = implode(",",$request->style_3);



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

        /*$collect = User::where('users.id','=',$user->id)->join('collects','users.id','=','collects.user_id')->join('tasks','collects.task_id','=','tasks.id')
        ->select('tasks.*')->orderBy('created_at', 'desc')->get();
        $followers = Follower::where('user_id','=',$user->id)->join('users','follow_id','=','users.id')->select('users.*')->orderBy('followers.created_at', 'desc')->get();
        $fans = Follower::where('follow_id','=',$user->id)->count();*/


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
        $style1 = DB::table('tasks')->select('style_1')->where('id','=',$id)->get();
        #$style = $style->style_1->toArray();
        $style2 = DB::table('tasks')->select('style_2')->where('id','=',$id)->get();
        $style3 = DB::table('tasks')->select('style_3')->where('id','=',$id)->get();
        $style1 = explode(",",$style1[0]->style_1);
        $style2 = explode(",",$style2[0]->style_2);
        $style3 = explode(",",$style3[0]->style_3);
        #dd($style1);
        #dd($style1[0]['attributes']['style_1']);
        if ($task->article_type=='p'){
            $steps= Step::where('task_id','=',$id)
        ->get();
            return view('tasks.edit_p')->with('task',$task)->withIngredients($ingredients)->withSteps($steps)->with('style1',$style1)->with('style2',$style2)->with('style3',$style3);
        }
        else
            
            return view('tasks.edit_v')->with('task',$task)->withIngredients($ingredients)->with('style1',$style1)->with('style2',$style2)->with('style3',$style3);
        
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
$task->style_1 = implode(',',$request->style_1);
$task->style_2 = implode(',',$request->style_2);
$task->style_3 = implode(',',$request->style_3);





$task->save();
$user = Auth::user();
$user->point +=15;
$user->save();
$request->input('ingridient');

Ingredient::where("task_id","=",$task->id)->delete();


foreach ($request->input('ingridient') as $key => $ingredient) {
$food = new Ingredient;
$food->name = $ingredient;
$food->quantity = $request->quantity[$key];
$food->task_id = $task->id;
$food->save();
}   

$old_s = Step::where("task_id","=",$task->id)->get();
$step_img_count = count($old_s);
Step::where("task_id","=",$task->id)->delete();
foreach ($request->input('intro') as $key => $step) {

    $food = new Step;
    
    if ($key < $step_img_count){
      $food->img_url = $old_s[$key]->img_url;
    }

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
if (strpos($request->video_url, 'youtube') != false){

  $regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/';
  preg_match($regExp,$request->video_url,$match);
  $task->video_url='www.youtube.com/embed/'.$match[2];
  $task->img_url = 'http://img.youtube.com/vi/'.$match[2].'/0.jpg';
}
elseif (strpos($request->video_url, 'facebook') != false) {
  $task->video_url = 'www.facebook.com/plugins/video.php?href='.rawurlencode($request->video_url);
  preg_match("~(?:t\.\d+/)?(\d+)~i", $request->video_url, $matches);
  //str_replace('/videos/', '', $matches[0]);
  $task->img_url = 'https://graph.facebook.com/'.$matches[0].'/picture';
}
else {
  $task->video_url = $request->video_url;
  $task->video_type = 'other';
}

$task->style_1 = implode(',',$request->style_1);
$task->style_2 = implode(',',$request->style_2);
$task->style_3 = implode(',',$request->style_3);



$task->save();
$user = Auth::user();
$user->point +=15;
$user->save();
$request->input('ingridient');

Ingredient::where("task_id","=",$task->id)->delete();

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
    {   Mail::where('task_id','=',$id)->delete();
        Task::find ( $id )->delete();
        return redirect()->action('userController@selfintro');
    }
}
