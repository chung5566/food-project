@extends('layouts.app')

@section('content')
<meta id="token" name="token" content="{ { csrf_token() } }">

<link href="{{ URL::asset('dist/css/food.css')}}" rel=stylesheet>
    <script type="text/javascript" src="{{ URL::asset('dist/js/task/tasks.js')}}"></script>


<div class="container" style="background: #e8e8e8;" >
	<div class='row' style="margin:100px 60px 50px 60px;">
		<div class="" style="display: inline-block;">
			<h1> {{$task->name}} </h1>
			<span class="glyphicon glyphicon-eye-open" aria-hidden="true">{{$task->popular}} </span>
			<span class="glyphicon glyphicon-heart" aria-hidden="true">{{count($collect)}}</span>
      <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">{{count($recommand)}}</span>

			

     @if ((Auth::check()))
      @if ($task->user->id!=$user->id)
      @if (count($recommand)===0)
      <a id="recommand" type="button" class="btn-success ladda-button btn-fix" data-token="{{ csrf_token() }}" style="margin-right:5px;margin-left:150px"><span class="glyphicon glyphicon glyphicon-thumbs-up" aria-hidden="true"></span><span class="ladda-label">喜歡</span></a>
      @else
      <a id="recommand" type="button" class="btn-danger ladda-button btn-fix" data-token="{{ csrf_token() }}" style="margin-right:5px;margin-left:150px"><span class="glyphicon glyphicon glyphicon-thumbs-up" aria-hidden="true" style="display:none"></span><span class="ladda-label">收回</span></a>
      @endif
      
      @if (count($collect)===0)
      <a id="collect" type="button" class="btn-success ladda-button btn-fix" data-token="{{ csrf_token() }}" style="margin-right:5px;"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span><span class="ladda-label">收藏</span></a>
      @else
      <a id="collect" type="button" class="btn-danger ladda-button btn-fix" data-token="{{ csrf_token() }}" style="margin-right:5px; "><span class="glyphicon glyphicon-heart-empty" aria-hidden="true" style="display:none"></span><span class="ladda-label">取消收藏</span></a>
      @endif

      @else
      <a href="{{URL::asset('tasks').'/'.$task->id.'/delete'}}" type="button" class="btn-fix btn-danger" style="margin-right:5px;margin-left:150px;color:gray"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>刪除</a>
      <a href="{{URL::asset('tasks').'/'.$task->id.'/edit'}}" type="button" class="btn-fix btn-success" style="margin-right:5px;color:gray"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>編輯</a>
      @endif
      @endif
      	
			<!--<div class="btn-group" style="margin-bottom:4px">
        	<button class="ladda-button btn-fix dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        		<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
          分享 <span class="caret"></span>
        	</button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Line</a></li>
          <li><a href="#">Email</a></li>
        </ul>
      </div>-->

		</div>
		<div class="well" id="member_index">
			<div class="row">
				<a class="task_user_inform:hover" href="{{ URL::asset('member/').'/'.$task->user->id}}">
				<div class="col-md-8 col-xs-8" style="text-align: end;">
					<div>{{$task->user->name}}</div>
					<div>料理<span>{{count($task->user->tasks)}}</span>/收藏<span>{{count($task->user->collecttask)}}</span>/</div>
          <div>追蹤<span>{{count($task->user->follows)}}</span>/粉絲<span>{{count($task->user->follower)}}</span>/</div>

				</div>
				<div class="col-md-4 col-xs-4">
				<img src="{{URL::asset('user-upload').'/'.$task->user->user_img}}" data-holder-rendered="true" style="height: 75px; width: 75px;margin-right:10px; display: block;">
				</div>
			</a>
			</div>
			
		</div>
	
		
</div>
<div class="row" style="margin:0px 60px 50px 40px;">
				<div class="col-md-6 col-xs-6"style="padding:0px">
                    <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('foodpic-upload').'/'.$task->img_url}}" data-holder-rendered="true" style="height: 300px; width: 100%; display: block;">

				</div>
				<div class="col-md-6 col-xs-6"style="padding:0px;background:white;height:300px;overflow: auto;">
					<div style="margin:10px 50px 20px 30px">
					<div style="border-bottom: solid 2px;line-height: 2;">烹調時間: {{$task->cooktime}} 分</div>
					<div style="border-bottom: solid 2px;line-height: 2;">{{$task->portion}} 人份</div>
					<div style="border-bottom: solid 2px;line-height: 2;">
					<div style="line-height: 2;">食材:</div>
					<ul style="margin-left:10px;">
						@foreach($ingredients as $ingredient)
            <li>{{$ingredient->name}}<span style="float:right;margin-right:30px">{{$ingredient->quantity}}</span>
            @endforeach
					</ul>
					</div>
					<div style="margin-top:10px">{{$task->shortintro}}</div>
				</div>
				</div>				
			</div>
</div>
<div class="container" style="margin-top:60px">
              @foreach($steps as $key => $step)

<div class="row food_pic_intro" style="margin-bottom:30px">
                    <div class="col-md-5 col-xs-5">
                        <!-- 4:3 aspect ratio -->
                        @if($step->img_url)
                        <img data-src="holder.js/100%x200" alt="100%x200" style="height:300px;width:100%;
                         display: block;" src="{{URL::asset('step-upload').'/'.$step->img_url}}" data-holder-rendered="true">
                        @endif
                    </div>
                    <div class="col-md-7 col-xs-7">
                        <h3><strong>{{$key+1}}</strong></h3><h3>
                        <p>{{$step->text}}
                    </p></h3></div>
</div>
@endforeach

<div style="border:solid 2px black;margin-top:30px;line-height:3;text-align:center;color:#ff6600">
	Tips:<span>{{$task->tip}}</span>
</div>
</div>
<div class="container" style="margin-top:20px">
                <div class="well">
                    <h4>留言:</h4>
                    @if(Auth::check())
                    <form action="{{url('tasks/foodcomment')}}" id="foodcomment" method='POST'>
                    <input type="hidden" name="task_id" value= "{{$task->id}}">
                    <input type="hidden" name="user_id" value= "{{$task->user->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit"id="foodcommentsubmit"  class="btn btn-primary">送出</button>

                    </form>
                    @else
                    <div>請先在此 <span><a style="color:white;background:#000033" href="{{ url('tasks/foodcomment/') }}/{{$task->id}}">點下登入</a><span> 以留言
                    </div>
                    @endif
                </div>
                <hr>

                <div class="container">
                @foreach ($comments as $comment)
                <div class="media">
                	<div class="row">
                    <a href="{{ URL::asset('member/').'/'.$comment->user->id}}" class="pull-left" href="#"style="margin-right:10px">
                        <img class="media-object" src="{{URL::asset('user-upload').'/'.$comment->user->user_img}}" alt="" width="100px" height="100px">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->user->name}}
                            <small>{{$comment->create_at}}</small>
                        </h4>{{$comment->content}}</div>
                    </div>
                </div>
                @endforeach
            	</div>

                <!-- Comment -->



</div>
	<!--<div class="container"style="text-align: center;">

		        <div class="fb-comments" style="margin:auto" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5" data-width="800px"></div>

	</div>-->
<script>
//var token	="{{Session::token()}}";
var id={{$task->id}};
</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '993562514031307',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.6&appId=923510224390757";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endsection
