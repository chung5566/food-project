@extends('layouts.app')

@section('content')
<link href="{{ URL::asset('dist/css/selfintro.css')}}" rel=stylesheet>

<div class="container">
	<div class='row' style="    display: flex;">
	<div class="col-md-7 col-xs-7">
		<div role="tabpanel">

  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist"style="margin-bottom:20px">
		    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{$user->name}}的食譜</a></li>
		    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{$user->name}}的好文</a></li>
		    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">{{$user->name}}的好物</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="home">
		   <ul class="nav nav-tabs" role="tablist"style="margin-bottom:20px">
		    <li role="presentation" class="active"><a href="#foodmine" aria-controls="foodmine" role="tab" data-toggle="tab">{{$user->name}}的食譜</a></li>
		    <li role="presentation"><a href="#foodthey" aria-controls="foodthey" role="tab" data-toggle="tab">追蹤的食譜</a></li>
		  </ul>
		  		  <div class="tab-content">
		  		  	<div id="custom-search-input">
                            <div class="input-group col-xs-12 col-md-12">
                                <input name="search-food" type="text" class="  search-query form-control" placeholder="Search">
                                <span class="input-group-btn">
                                	<button class="btn" type="button" onclick="cancelfindFood()">
                                        <span class=" glyphicon glyphicon-remove"></span>
                                    </button>
                                    <button class="btn" type="button" onclick="findFood()">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <script>
                        function findFood(){
                        var searchword = $("input[name='search-food']").val();
                        
                        $('.foodlist').each(function(){
                        	
                        	var foodname=$(this).find('.food_name').text();
                        	if (searchword!=''){
                        		
                        		if((foodname.indexOf(searchword))==-1){
                        			
                        			$(this).css('display','none');
                        			
                        		}
                        	}
                        	else{
                        		$(this).css('display','block');
                        		
                      		}

                        });
                    }
                    function cancelfindFood(){
                    	$("input[name='search-food']").val('');
                    	$('.foodlist').each(function(){
                    		$(this).css('display','block');

                    	})
                    }
                        </script>

		   <div role="tabpanel" class="tab-pane active " id="foodmine">
		   	@foreach ($tasks as $task)
		    		<div class="row border-blue foodlist" style="margin:20px auto">
		    		<div class="col-md-4 col-xs-4"style="padding-left:0;">
		    			<a href="{{ URL::asset('tasks/').'/'.$task->id}}" class="thumbnail">
          @if($task->article_type=='p')
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="{{URL::asset('foodpic-upload').'/'.$task->img_url}}" data-holder-rendered="true">
        					@elseif($task->article_type=='v')
        	<img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="{{$task->img_url}}" data-holder-rendered="true">
        			@endif</a>	
        </a>
		    		</div>
		    		<div class="col-md-8 col-xs-8" >
		    			<h3 class="bold "><span class="food_name">{{$task->name}}</span> <a href="tasks/{{$task->id}}/delete" type="button" class="btn-fix" style="float:right"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>刪除</a>
		    				<a href="tasks/{{$task->id}}/edit" type="button" class="btn-fix" style="float:right;margin-right:3px"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>編輯</a>
		    			</h3>
		    			<div style="margin-right:10%">{{$task->shortintro}}</div>
		    		</div>

					</div>
			@endforeach
				</div>
				<div role="tabpanel" class="tab-pane " id="foodthey">
	@foreach($collect as $task)
		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4 col-xs-4"style="padding-left:0;">
		    			<a href="tasks/{{$task->id}}" class="thumbnail">
		    				@if($task->article_type=='p')
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="{{URL::asset('foodpic-upload').'/'.$task->img_url}}" data-holder-rendered="true">
        					@elseif($task->article_type=='v')
        	<img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="{{$task->img_url}}" data-holder-rendered="true">
        			@endif</a>				
		    		</div>
		    		<div class="col-md-8 col-xs-8" >
		    			<h3 class="bold">{{$task->name}} <button type="button" class="btn-fix" style="float:right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>收藏</button></h3>
		    			<div style="margin-right:10%">{{$task->shortintro}}</div>
		    		</div>
					</div>
			@endforeach
				</div>			
		    	</div>

		    </div>
		    <div role="tabpanel" class="tab-pane " id="profile">
		   <ul class="nav nav-tabs" role="tablist"style="margin-bottom:20px">
		    <li role="presentation" class="active"><a href="#itemmine" aria-controls="itemmine" role="tab" data-toggle="tab">{{$user->name}}好文</a></li>
		    <li role="presentation"><a href="#itemthey" aria-controls="itemthey" role="tab" data-toggle="tab">追蹤的好文</a></li>
		  </ul>
		  		  <div class="tab-content">

		   <div role="tabpanel" class="tab-pane active" id="itemmine">

		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4 col-xs-4"style="padding-left:0;">
		    			<a href="#" class="thumbnail">
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
        </a>
		    		</div>
		    		<div class="col-md-8 col-xs-8" >
		    			<h3 class="bold">西班牙海鮮燉飯 <button type="button" class="btn-fix" style="float:right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>收藏數:</button></h3>
		    			<div style="margin-right:10%">說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明</div>
		    		</div>

					</div>
		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4 col-xs-4"style="padding-left:0;">
		    			<a href="#" class="thumbnail">
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
        </a>
		    		</div>
		    		<div class="col-md-8 col-xs-8" >
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
		    <li role="presentation" class="active"><a href="#messagemine" aria-controls="messagemine" role="tab" data-toggle="tab">{{$user->name}}的好物</a></li>
		    <li role="presentation"><a href="#messagethey" aria-controls="messagethey" role="tab" data-toggle="tab">追蹤的好物</a></li>
		  </ul>
		  		  <div class="tab-content">

		   <div role="tabpanel" class="tab-pane active" id="messagemine">

		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4 col-xs-4"style="padding-left:0;">
		    			<a href="#" class="thumbnail">
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
        </a>
		    		</div>
		    		<div class="col-md-8 col-xs-8" >
		    			<h3 class="bold">西班牙海鮮燉飯 <button type="button" class="btn-fix" style="float:right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>收藏數:</button></h3>
		    			<div style="margin-right:10%">說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明>說明說明</div>
		    		</div>

					</div>
		    		<div class="row border-blue" style="margin:20px auto">
		    		<div class="col-md-4 col-xs-4"style="padding-left:0;">
		    			<a href="#" class="thumbnail">
          <img data-src="holder.js/100%x180" alt="100%x180" style="height: 160px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjYxIiB5PSI5MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE3MXgxODA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
        </a>
		    		</div>
		    		<div class="col-md-8 col-xs-8" >
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
	<div class="col-md-4 col-xs-4" style="margin:0px auto">
		<div class="row border-blue">
		<div class="row " id="namepic"style='margin:0px'>
			<div  class="col-md-8 col-xs-8"style="padding-right:0">
				<div id="username"><h1 style="margin-bottom:20px"><span style="margin-right:20px;">{{$user->name}}</span></h1><small style="position:relative">積分:{{$user->point}}  </small><small style="position:relative;margin-right:5px"><a style="color:white" data-toggle="modal" data-target="#rule">積分規則 </a></small></div>
			</div>

			<div class="col-md-4 col-xs-4"style="display:flex">
<img data-src="holder.js/140x140" class="img-circle" alt="140x140" style="width: 100px; height: 100px;" src="{{URL::asset('user-upload').'/'.$user->user_img}}" data-holder-rendered="true">
			</div>
		</div>
		<div class="row" style='margin:0px'>
			<br>
			<div style="margin:10px ;font-weight:bolder">
				<p>
			{{$user->selfintro}}
				</p>
		</div>

		</div>
	</div>
			<div class="row" style="background:#cccccc;border:solid 2px #b0b1b1">
			<div class="row" style="margin:15px;    text-align: center;font-weight:bolder">
				<div class="col-md-4 col-xs-4">食譜 {{count($tasks)}}</div>
				<div class="col-md-4 col-xs-4"style="border-right:2px solid black;border-left:2px solid black">收藏 {{count($collect)}}</div>
				<div class="col-md-4 col-xs-4">粉絲 {{$fans}}</div>
			</div>

		</div>
<div class="btn-group" data-toggle="buttons" style="width:100%">
                <label class="btn btn-primary "style="width:100%">
                    <input  type="checkbox" name="" id="" autocomplete="off" value="follow"  data-parsley-multiple=""> 追蹤
                </label>
                
            </div>

            <div class="row"style="margin-top:20px">
		    <div role="tabpanel" style='width:90%;margin:auto'>

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#message1" aria-controls="message1" role="tab" data-toggle="tab">全部</a></li>
		    <li role="presentation"><a href="#message2" aria-controls="message2" role="tab" data-toggle="tab">信件</a></li>
		    <li role="presentation"><a href="#message3" aria-controls="message3" role="tab" data-toggle="tab">通知</a></li>
		    <li role="presentation"><a href="#message4" aria-controls="message4" role="tab" data-toggle="tab">留言</a></li>

		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="message1">
		    	<table class="table table-striped">
      <thead>
        <tr>
          
          <th>寄件人</th>
          <th>內容</th>
          
        </tr>
      </thead>
      <tbody>
      	@foreach($mails as $m)
        <tr>
          @if($m->sender!='admin')
          <td><a href="{{ URL::asset('member/').'/'.$m->sender}}">{{$m->sender_name}}</a></td>
          @else
          <td>{{$m->sender_name}}</td>
          @endif
          @if ($m->type ==('推薦')||$m->type ==('留言')||$m->type ==('收藏'))
          <td><a href="{{URL::asset('tasks').'/'.$m->task_id}}">{{$m->text}}</a></td>
          @elseif ($m->type ==('課程留言'))
          <td><a href="{{URL::asset('school').'/'.$m->task_id}}">{{$m->text}}</a></td>
          @else
          <td>{{$m->text}}</td>          
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="message2">
		    <table class="table table-striped">
      <thead>
        <tr>
          
          <th>寄件人</th>
          <th>內容</th>
          
        </tr>
      </thead>
      <tbody>
      	@foreach($mails as $m)
        <tr>
          @if ($m->type ==('管理員'))
          @if($m->sender!='admin')
          <td><a href="{{ URL::asset('member/').'/'.$m->sender}}">{{$m->sender_name}}</a></td>
          @else
          <td>{{$m->sender_name}}</td>
          @endif
          <td>{{$m->text}}</td>          
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="message3">
		    	<table class="table table-striped">
      <thead>
        <tr>
          
          <th>寄件人</th>
          <th>內容</th>
          
        </tr>
      </thead>
      <tbody>
      	@foreach($mails as $m)
        <tr>
        @if ($m->type ==($m->type ==('推薦')||$m->type ==('收藏')))
          
          <td><a href="{{ URL::asset('member/').'/'.$m->sender}}">{{$m->sender_name}}</a></td>
          
          
          <td><a href="{{URL::asset('tasks').'/'.$m->task_id}}">{{$m->text}}</a></td>        
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="message4">
		    	<table class="table table-striped">
      <thead>
        <tr>
          
          <th>寄件人</th>
          <th>內容</th>
          
        </tr>
      </thead>
      <tbody>
      	@foreach($mails as $m)
        <tr>
          @if (($m->type ==('留言'))||($m->type ==('課程留言')))
          <td><a href="{{ URL::asset('member/').'/'.$m->sender}}">{{$m->sender_name}}</a></td>
          @if (($m->type ==('留言')))
          <td><a href="{{URL::asset('tasks').'/'.$m->task_id}}">{{$m->text}}</a></td>    
          @elseif(($m->type ==('課程留言')))
          <td><a href="{{URL::asset('school').'/'.$m->task_id}}">{{$m->text}}</a></td>
          @endif
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
		    </div>
		  </div>

		</div>
            </div>

	</div>


</div>

</div>

<div class="modal fade" id="rule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">積分規則</h4>
      </div>
      <div class="modal-body">
        積分規則<br>
        積分規則<br>
        積分規則<br>
        積分規則<br>
        積分規則<br>
        積分規則<br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection