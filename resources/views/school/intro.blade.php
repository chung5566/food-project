@extends('layouts.schoolapp')

@section('content')
<link href={{ URL::asset('dist/css/school/schoolintro.css')}} rel=stylesheet>
<div class="container" style="width:50%;text-align: center;">
		<h2 class="bold inform">開課資訊</h2>
		<div class="row" style="margin-bottom:30px">
	<a class="btn more" style="float:left" href="{{ URL::asset('school/')}}">返回上一頁</a>
		</div>
	<div class="row">
		<img data-src="holder.js/100%x180" alt="100%x180" style="height: 400px; width: 100%; display: block;" src="{{URL::asset('schoolpic-upload').'/'.$schools[0]->img_url}}" data-holder-rendered="true">

	</div>


</div>
<div class="container" style="width:50%;margin:20px auto">
	<div class="row">
		<div  class="col-md-7" style="text-align:center">
			<div id="school_intro" class="well" style="text-align:center;margin:5px 10px;">

				<h3 class="bold inform" style="border-bottom:solid 2px black;display: inline;">{{$schools[0]->school_name}}</h3>
			
				<div class="row bold" >
				日期:
				<div>
					{{$schools[0]->school_date}}
				</div><br>
			</div>
			<div class="row bold" >
				上課人數:
				<div>
					{{$schools[0]->people}}
				</div><br>
			</div>

			<div class="row bold" >
				課程簡介:
				<div>
					{{$schools[0]->intro}}
				</div><br>
			</div>
			<div class="row bold" >
				上課地址:
				<div>
					{{$schools[0]->address}}
				</div><br>

			</div>
			<div class="row bold" >
				費用:
				<div>
					{{$schools[0]->money}}
				</div><br>
			</div>
			<div class="row bold" >
				自備材料:
				<div>
					{{$schools[0]->ingredient}}
				</div><br>
			</div>
			<div class="row bold" >
				積分可扣抵:
				<div>
					{{$schools[0]->discount}}
				</div><br>
			</div>
			<div class="row bold" >
				注意事項:
				<div>
					{{$schools[0]->warnning}}
				</div><br>
			</div>
			<div class="row bold" >
				報名截止日:
				<div>
					{{$schools[0]->stopdate}}
				</div><br>
			</div>
		</div>
		@if (Auth::guest())
		<a id="join" class="btn" href="{{ url('/login') }}" style="background:#000033;color:white;padding:10px 120px;">我要報名</a>			
		@else
		<a id="join" class="btn"  style="background:#000033;color:white;padding:10px 120px;"data-toggle="modal" data-target="#myModal">我要報名</a>			
		@endif
		</div>
		<div class="col-md-5" style="padding-left:0px">
			<div class="well" id="member_index">
			<div class="row">
				<a style="color:white" href="{{ URL::asset('member/').'/'.$schools[0]->user->id}}">
				<div class="col-md-8" style="text-align: end;">
					<div>{{$schools[0]->user->name}}</div>
					<div>料理<span>8</span>/收藏<span>20</span>/</div>
					<div>追蹤<span>30</span>/粉絲<span>100</span>/</div>

				</div>
				<div class="col-md-4">
				<img src="{{URL::asset('user-upload').'/'.$schools[0]->user->user_img}}" data-holder-rendered="true" style="height: 60px; width: 60px;margin-right:10px; display: block;">
				</div>
			</a>
			</div>
			
		</div>
		</div>
	</div>
	</div>
<div class="container" style="margin-top:20px">
                <div class="well">
                    <h4>留言:</h4>
                    <form action='schoolcomment' id="schoolcomment" method='POST'>
                    <input type="hidden" name="task_id" value= "{{$schools[0]->id}}">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>
                        @if (Auth::guest())
                        <a href="{{ url('/login') }}" type="button" id="foodcommentsubmit"  class="btn btn-primary">請先登入來留言</a>
                        @else
                        <button type="submit" id="foodcommentsubmit"  class="btn btn-primary">送出</button>
                        @endif
                    </form>
                    
                </div>
                <hr>
                <div class="container">
                @foreach ($comments as $comment)
                <div class="media">
                	<div class="row">
                    <a class="pull-left" href="#"style="margin-right:10px">
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
@if (!Auth::guest())
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">報名資訊</h4>
      </div>
      <div class="modal-body">
        <form id="joinform" class="bs-example bs-example-form" role="form">
        	<input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="input-group">
      <span class="input-group-addon">*名字</span>
      <input name='name' type="text" class="form-control" placeholder="Username" value="{{ Auth::user()->name }}">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">*聯絡信箱</span>
      <input name='mail' type="text" class="form-control" value='{{ Auth::user()->email }}'>
      
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">連絡電話</span>
      <input name='phone' type="text" class="form-control" >
    </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
        <button id='joinbutton' type="button" class="btn btn-primary">報名去!</button>
      </div>
    </div>
  </div>
</div>
@endif
<script>
    $('#joinbutton').on("click", function() {
                $.post('joinschool', $('#joinform').serialize(), function(response) {
                    
                    //console.log(response)
                    //var contact = JSON.parse(response);
                    
                    var nowurl =window.location.href ;
                    $('#myModal').modal('hide');
                    alert('報名成功!');
                });
});

</script>














@endsection