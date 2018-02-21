@extends('layouts.productapp')

@section('content')
<meta id="token" name="token" content="{ { csrf_token() } }">

<link href="{{ URL::asset('dist/css/food.css')}}" rel=stylesheet>
    <script type="text/javascript" src="{{ URL::asset('dist/js/task/tasks.js')}}"></script>


<div class="container" style="background: #e8e8e8;" >
	<div class='row' style="margin:100px 60px 50px 60px;">
		<div class="" style="display: inline-block;">
			<h1> {{$product->name}} </h1>
			<span class="glyphicon glyphicon-eye-open" aria-hidden="true">{{$product->popular}} </span>
			

		</div>
		<div class="well" id="member_index">
			<div class="row">
				<a class="task_user_inform:hover" href="{{ URL::asset('member/').'/'.$product->user->id}}">
				<div class="col-md-8 col-xs-8" style="text-align: end;">
					<div>{{$product->user->name}}</div>
					<div>料理<span>暫空</span>/收藏<span>暫空</span>/</div>
          <div>追蹤<span>暫空</span>/粉絲<span>暫空</span>/</div>

				</div>
				<div class="col-md-4 col-xs-4">
				<img src="{{URL::asset('user-upload').'/'.$product->user->user_img}}" data-holder-rendered="true" style="height: 75px; width: 75px;margin-right:10px; display: block;">
				</div>
			</a>
			</div>
			
		</div>
	
		
</div>
<div class="row" style="margin:0px 60px 50px 40px;">
				<div class="col-md-6 col-xs-6"style="padding:0px">
                    <img data-src="holder.js/100%x180" alt="100%x180" src="{{URL::asset('productpic-upload').'/'.$product->img_url}}" data-holder-rendered="true" style="height: 300px; width: 100%; display: block;">

				</div>
				<div class="col-md-6 col-xs-6"style="padding:0px;background:white;height:300px;overflow: auto;">
					<div style="margin:10px 50px 20px 30px">
					<div style="border-bottom: solid 2px;line-height: 2;">商品大小尺寸: {{$product->size}}</div>
					<div style="border-bottom: solid 2px;line-height: 2;">商品保存期限: {{$product->life}}</div>
          <div style="border-bottom: solid 2px;line-height: 2;">商品描述: {{$product->description}}</div>
          <div style="border-bottom: solid 2px;line-height: 2;">自家賣場或網址: {{$product->sell_url}}</div>
          <div style="border-bottom: solid 2px;line-height: 2;">聯絡方式: {{$product->contact}}</div>
					</div>
					
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
                         display: block;" src="{{URL::asset('productstep-upload').'/'.$step->img_url}}" data-holder-rendered="true">
                        @endif
                    </div>
                    <div class="col-md-7 col-xs-7">
                        <h3><strong>{{$key+1}}</strong></h3><h3>
                        <p>{{$step->text}}
                    </p></h3></div>
</div>
@endforeach


</div>

<script>
//var token	="{{Session::token()}}";
var id={{$product->id}};
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
