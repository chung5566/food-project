@extends('layouts.app')

@section('content')
<link href="{{ URL::asset('dist/css/food.css')}}" rel=stylesheet>
    <script type="text/javascript" src="{{ URL::asset('dist/js/task/tasks.js')}}"></script>

<meta id="token" name="token" content="{ { csrf_token() } }">


<div class="container" style="background: #e8e8e8;" >
	<div class='row' style="margin:100px 60px 20px 60px;">
		<div class="" style="display: inline-block;">
			<h1> {{$task->name}} </h1>
			<span class="glyphicon glyphicon-eye-open" aria-hidden="true">{{$task->popular}} </span>
			<span class="glyphicon glyphicon-heart" aria-hidden="true">{{count($collect)}}</span>
      <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">{{count($recommand)}}</span>
@if ($user!='')
      @if ($task->user->id != $user->id)

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
				<a href="{{ URL::asset('member/').'/'.$task->user->id}}">
				<div class="col-md-8" style="text-align: end;">
					<div>{{$task->user->name}}</div>
					<div>料理<span>8</span>/收藏<span>20</span>/</div>
					<div>追蹤<span>30</span>/粉絲<span>100</span>/</div>

				</div>
				<div class="col-md-4">
				<img src="{{URL::asset('user-upload').'/'.$task->user->user_img}}" data-holder-rendered="true" style="height: 75px; width: 75px;margin-right:10px; display: block;">
				</div>
			</a>
			</div>
			
		</div>
	
		
</div>
<div class="well" style="width: 60%;margin: auto;margin-bottom: 20px;
">
	<div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{$task->video_url}}" allowfullscreen=""></iframe>
                        </div>
</div>
<div class="row" style="    
    margin: 10px 25px;
    background: white;
        display: flex;
    ">
	<div class="col-md-2" style="margin: 15px auto;text-align:center;    border-right: 2px solid black;">
		<div style="margin:20px auto;"> 
		<div>烹調時間</div>
		
		<div style="margin:10px auto;"><span style="font-size:40px;font-weight: bold;">{{$task->cooktime}}</span><br><span>mins</span></div>
		</div>
	</div>
	<div class="col-md-5" style="margin: 15px auto;border-right: 2px solid black;">
	<div >食材:</div>
					<ul style="margin-left:10px;">
						@foreach($ingredients as $ingredient)
						<li>{{$ingredient->name}}<span style="float:right;margin-right:30px">{{$ingredient->quantity}}</span>
						@endforeach
					</ul>
					</div>	
	<div class="col-md-5" style="margin: 36px auto;">{{$task->shortintro}}</div>

</div>


</div>
<div class="container" style="margin-top:0px">

<div style="border:solid 2px black;margin-top:30px;line-height:3;text-align:center;color:#ff6600">
	Tips:<span>{{$task->tip}}</span>
</div>
</div>
<div style="width:80%;border-bottom:solid 2px black;margin: auto;margin-top:100px;margin-bottom:50px"></div>
	<div class="container"style="text-align: center;">

<div class="container" style="margin-top:20px">
                <div class="well">
                    <h4>留言:</h4>
                    <form action="{{url('tasks/foodcomment')}}" id="foodcomment" method='POST'>
                    <input type="hidden" name="task_id" value= "{{$task->id}}">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit"id="foodcommentsubmit"  class="btn btn-primary">送出</button>

                    </form>
                    
                </div>
                <hr >
                <div class="container">
                @foreach ($comments as $comment)
                <div class="media">
                	<div class="row">
                    <a class="pull-left" href="#"style="margin-right:10px">
                        <img class="media-object" src="{{URL::asset('user-upload').'/'.$comment->user->user_img}}" alt=""width="100px" height="100px">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->user->name}}
                            <small>{{$comment->create_at}}</small>
                        </h4>{{$comment->content}}</div>
                    </div>
                </div>
                @endforeach
            	</div>
               




	</div>
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
