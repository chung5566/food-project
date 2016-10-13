@extends('layouts.app')

@section('content')
<link href=dist/css/food.css rel=stylesheet>

<div class="container" style="background: #e8e8e8;" >
	<div class='row' style="margin:100px 60px 20px 60px;">
		<div class="" style="display: inline-block;">
			<h1>奶油培根蘑菇蛋黃義大利麵</h1>
			<span class="glyphicon glyphicon-heart" aria-hidden="true" style="margin-right:10px">100</span>
			<span class="glyphicon glyphicon-comment" aria-hidden="true"> 6</span>
			
			<button type="button" class="btn-fix" style="margin-right:5px;margin-left:150px"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>收藏</button>
			<div class="btn-group" style="margin-bottom:4px">
        	<button class="btn-fix dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        		<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
          分享 <span class="caret"></span>
        	</button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Line</a></li>
          <li><a href="#">Email</a></li>
        </ul>
      </div>

		</div>
		<div class="well" id="member_index">
			<div class="row">
				<div class="col-md-8" style="text-align: end;">
					<div>name</div>
					<div>料理<span>8</span>/收藏<span>20</span>/</div>
					<div>追蹤<span>30</span>/粉絲<span>100</span>/</div>

				</div>
				<div class="col-md-4">
				<img src="dist/images/usericon.png" data-holder-rendered="true" style="height: 75px; width: 75px;margin-right:10px; display: block;">
				</div>

			</div>
			
		</div>
	
		
</div>
<div class="well" style="width: 60%;margin: auto;margin-bottom: 20px;
">
	<div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen=""></iframe>
                        </div>
</div>
<div class="row" style="    
    margin: 10px 25px;
    background: white;
    ">
	<div class="col-md-2" style="margin: 15px auto;text-align:center;    border-right: 2px solid black;">
		<div style="margin:20px auto;"> 
		<div>烹調時間</div>
		
		<div style="margin:10px auto;"><span style="font-size:40px;font-weight: bold;">30</span><br><span>mins</span></div>
		</div>
	</div>
	<div class="col-md-5" style="margin: 15px auto;border-right: 2px solid black;">
	<div >食材:</div>
					<ul style="margin-left:10px;">
						<li>食材<span style="float:right;margin-right:30px">兩匙</span>
						<li>食材<span style="float:right;margin-right:30px">兩匙</span>
						<li>食材<span style="float:right;margin-right:30px">兩匙</span>
						<li>食材<span style="float:right;margin-right:30px">兩匙</span>
						<li>食材<span style="float:right;margin-right:30px">兩匙</span>
						<li>食材<span style="float:right;margin-right:30px">兩匙</span>
					</ul>
					</div>	
	<div class="col-md-5" style="margin: 36px auto;">簡介第一行簡介第一行簡介第一行簡介第一行簡介第一行簡介第一行
						  簡介第一行簡介第一行簡介第一行簡介第一行簡介第一行
						  簡介第一行簡介第一行簡介第一行簡介第一行簡介第一行</div>

</div>


</div>
<div class="container" style="margin-top:0px">

<div style="border:solid 2px black;margin-top:30px;line-height:3;text-align:center;color:#ff6600">
	Tips:<span>小訣竅小訣竅小訣竅小訣竅小訣竅小訣竅小訣竅小訣竅小訣竅小訣竅小訣竅小訣竅</span>
</div>
</div>
<div style="width:80%;border-bottom:solid 2px black;margin: auto;margin-top:100px;margin-bottom:50px"></div>
	<div class="container"style="text-align: center;">

		        <div class="fb-comments" style="margin:auto" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5" data-width="800px"></div>

	</div>

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
