@extends('layouts.app')

@section('content')
<link href=dist/css/food.css rel=stylesheet>

<div class="container" style="background: #e8e8e8;" >
	<div class='row' style="margin:100px 60px 50px 60px;">
		<div class="" style="display: inline-block;">
			<h1> {{ $post->id }} </h1>
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
<div class="row" style="margin:0px 60px 50px 40px;">
				<div class="col-md-6"style="padding:0px">
                    <img data-src="holder.js/100%x180" alt="100%x180" src="http://ntdimg.com/pic/2014/8-17/p5195692a649299378.jpg" data-holder-rendered="true" style="height: 300px; width: 100%; display: block;">

				</div>
				<div class="col-md-6"style="padding:0px;background:white;height:300px;overflow: auto;">
					<div style="margin:10px 50px 20px 30px">
					<div style="border-bottom: solid 2px;line-height: 2;">烹調時間:</div>
					<div style="border-bottom: solid 2px;line-height: 2;">
					<div style="line-height: 2;">食材:</div>
					<ul style="margin-left:10px;">
						<li>食材<span style="float:right;margin-right:50px">兩匙</span>
						<li>食材<span style="float:right;margin-right:50px">兩匙</span>
						<li>食材<span style="float:right;margin-right:50px">兩匙</span>
						<li>食材<span style="float:right;margin-right:50px">兩匙</span>
					</ul>
					</div>
					<div style="margin-top:10px">簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介
					簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介
				簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介</div>
				</div>
				</div>				
			</div>
</div>
<div class="container" style="margin-top:60px">
<div class="row food_pic_intro" style="margin-bottom:30px">
                    <div class="col-md-5">
                        <!-- 4:3 aspect ratio -->
                        
                        <img data-src="holder.js/100%x200" alt="100%x200" style="height:300px;
                         display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjkzIiB5PSIxMDAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTFwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4yNDJ4MjAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">
                    </div>
                    <div class="col-md-7">
                        <h3><strong>1</strong></h3><h3>
                        <p>這是說明這是說明這是說明這是說明這是說明這是說明這是說明這是說明這是說明
                    </p></h3></div>
</div>
<div class="row food_pic_intro">
                    <div class="col-md-5">
                        <!-- 4:3 aspect ratio -->
                        
                        <img data-src="holder.js/100%x200" alt="100%x200" style="height:300px;
                         display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjkzIiB5PSIxMDAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTFwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4yNDJ4MjAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">
                    </div>
                    <div class="col-md-7">
                        <h3><strong>2</strong></h3><h3>
                        <p>這是說明這是說明這是說明這是說明這是說明這是說明這是說明這是說明這是說明
                    </p></h3></div>
</div>
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
