@extends('layouts.app')

@section('content')

<link href="{{ URL::asset('dist/css/selfintro.css')}}" rel=stylesheet>
<meta id="token" name="token" content="{ { csrf_token() } }">
<div style="display:none" id="member_id_hide">{{$member[0]->id}} </div>
<div style="display:none" id="token_hide">{{csrf_token()}} </div>

<div class="container">
	<div class='row' style="    display: flex;">
	<div class="col-md-7">
		<div role="tabpanel">

  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist"style="margin-bottom:20px">
		    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{$member[0]->name}}的食譜</a></li>
		    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{$member[0]->name}}的好文</a></li>
		    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">{{$member[0]->name}}的好物</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="home">
		   <ul class="nav nav-tabs" role="tablist"style="margin-bottom:20px">
		    <li role="presentation" class="active"><a href="#foodmine" aria-controls="foodmine" role="tab" data-toggle="tab">{{$member[0]->name}}的食譜</a></li>
		    <li role="presentation"><a href="#foodthey" aria-controls="foodthey" role="tab" data-toggle="tab">追蹤的食譜</a></li>
		  </ul>
		  		  <div class="tab-content">

		   <div role="tabpanel" class="tab-pane active" id="foodmine">
		   	@foreach($tasks as $task)
		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4"style="padding-left:0;">
		    			<a href="{{URL::asset('tasks').'/'.$task->id}}" class="thumbnail">
		    				@if($task->article_type=='p')
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="{{URL::asset('foodpic-upload').'/'.$task->img_url}}" data-holder-rendered="true">
        					@elseif($task->article_type=='v')
        	<img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="{{$task->img_url}}" data-holder-rendered="true">
        			@endif</a>				
		    		</div>
		    		<div class="col-md-8" >
		    			<h3 class="bold">{{$task->name}} <button type="button" class="btn-fix" style="float:right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>已收藏</button></h3>
		    			<div style="margin-right:10%">{{$task->shortintro}}</div>
		    		</div>
					</div>
			@endforeach
				</div>
				<div role="tabpanel" class="tab-pane " id="foodthey">
		@foreach($collect as $task)
		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4"style="padding-left:0;">
		    			<a href="{{ URL::asset('tasks/').'/'.$task->id}}" class="thumbnail">
		    				@if($task->article_type=='p')
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="{{URL::asset('foodpic-upload').'/'.$task->img_url}}" data-holder-rendered="true">
        					@elseif($task->article_type=='v')
        	<img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="{{$task->img_url}}" data-holder-rendered="true">
        			@endif</a>				
		    		</div>
		    		<div class="col-md-8" >
		    			<h3 class="bold">{{$task->name}} <button type="button" class="btn-fix" style="float:right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>已收藏</button></h3>
		    			<div style="margin-right:10%">{{$task->shortintro}}</div>
		    		</div>
					</div>
			@endforeach
				</div>			
		    	</div>

		    </div>
		    <div role="tabpanel" class="tab-pane " id="profile">
		   <ul class="nav nav-tabs" role="tablist"style="margin-bottom:20px">
		    <li role="presentation" class="active"><a href="#itemmine" aria-controls="itemmine" role="tab" data-toggle="tab">{{$member[0]->name}}好文</a></li>
		    <li role="presentation"><a href="#itemthey" aria-controls="itemthey" role="tab" data-toggle="tab">追蹤的好文</a></li>
		  </ul>
		  		  <div class="tab-content">

		   <div role="tabpanel" class="tab-pane active" id="itemmine">

		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4"style="padding-left:0;">
		    			<a href="#" class="thumbnail">
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
        </a>
		    		</div>
		    		<div class="col-md-8" >
		    			<h3 class="bold">西班牙海鮮燉飯 <button type="button" class="btn-fix" style="float:right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>收藏數:</button></h3>
		    			<div style="margin-right:10%">說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明</div>
		    		</div>

					</div>
		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4"style="padding-left:0;">
		    			<a href="#" class="thumbnail">
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
        </a>
		    		</div>
		    		<div class="col-md-8" >
		    			<h3 class="bold">西班牙海鮮燉飯 <button type="button" class="btn-fix" style="float:right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>收藏數:</button></h3>
		    			<div style="margin-right:10%">說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明</div>
		    		</div>

					</div>	
				</div>
				<div role="tabpanel" class="tab-pane " id="itemthey">afasfas	</div>			
		    	</div>

		    </div>
		    <div role="tabpanel" class="tab-pane " id="messages">
		   <ul class="nav nav-tabs" role="tablist"style="margin-bottom:20px">
		    <li role="presentation" class="active"><a href="#messagemine" aria-controls="messagemine" role="tab" data-toggle="tab">{{$member[0]->name}}的好物</a></li>
		    <li role="presentation"><a href="#messagethey" aria-controls="messagethey" role="tab" data-toggle="tab">追蹤的好物</a></li>
		  </ul>
		  		  <div class="tab-content">

		   <div role="tabpanel" class="tab-pane active" id="messagemine">

		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4"style="padding-left:0;">
		    			<a href="#" class="thumbnail">
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
        </a>
		    		</div>
		    		<div class="col-md-8" >
		    			<h3 class="bold">西班牙海鮮燉飯 <button type="button" class="btn-fix" style="float:right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>收藏數:</button></h3>
		    			<div style="margin-right:10%">說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明</div>
		    		</div>

					</div>
		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4"style="padding-left:0;">
		    			<a href="#" class="thumbnail">
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
        </a>
		    		</div>
		    		<div class="col-md-8" >
		    			<h3 class="bold">西班牙海鮮燉飯 <button type="button" class="btn-fix" style="float:right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>收藏數:</button></h3>
		    			<div style="margin-right:10%">說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明</div>
		    		</div>

					</div>	
				</div>
				<div role="tabpanel" class="tab-pane " id="messagethey">afasfas	</div>			
		    	</div>

		    </div>
		  </div>

</div>
</ul>
	</div>
	<div class="col-md-4" style="margin:0px auto">
		<div class="row border-blue">
		<div class="row " id="namepic"style='margin:0px'>
			<div  class="col-md-8"style="padding-right:0">
				<div id="username"><h1 style="margin-bottom:20px"><span style="margin-right:20px;">{{$member[0]->name}}</span></h1></div>
			</div>

			<div class="col-md-4"style="display:flex">
<img data-src="holder.js/140x140" class="img-circle" alt="140x140" style="width: 100px; height: 100px;" src="{{URL::asset('user-upload').'/'.$member[0]->user_img}}" data-holder-rendered="true">
			</div>
		</div>
		<div class="row" style='margin:0px'>
			<br>
			<div style="margin:10px ;font-weight:bolder">
			{{$member[0]->selfintro}}

		</div>

		</div>
	</div>
			<div class="row" style="background:#cccccc;border:solid 2px #b0b1b1">
			<div class="row" style="margin:15px;    text-align: center;font-weight:bolder">
				<div class="col-md-4">食譜 {{count($tasks)}}</div>
				<div class="col-md-4"style="border-right:2px solid black;border-left:2px solid black">收藏 {{count($collect)}}</div>
				<div class="col-md-4">粉絲 {{$fans}}</div>
			</div>

		</div>
<div class="btn-group" data-toggle="buttons" style="width:100%">
			@if ($user!='')
			@if ($member[0]->id != $user->id)
			
			@if (count($follower)===0)
			<button id="follower" type="button" class="btn-success ladda-button btn-fix" data-token="{{ csrf_token() }}" style="width:100%;margin-top:10px"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span><span class="ladda-label">追蹤</span></button>
			@else
			<button id="follower" type="button" class="btn-danger ladda-button btn-fix" data-token="{{ csrf_token() }}" style="width:100%;margin-top:10px"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" style="display:none"></span><span class="ladda-label">取消追蹤</span></button>
			@endif
			
			@endif
			@endif	
                
            </div>
	</div>


</div>

</div>

<script>


var follow_id = {{$member[0]->id}};
</script>

@endsection