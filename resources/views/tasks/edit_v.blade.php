@extends('layouts.app')

@section('content')
<link href="{{ URL::asset('dist/css/food.css')}}" rel=stylesheet>
<form data-parsley-validate action="{{url('tasks/').'/'.$task->id}}" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value = "{{csrf_token()}}">
<div class="container" style="background: #e8e8e8;" >
	<div class='row' style="margin:20px 60px 10px 60px;">
		<div class="btn-group" style="float:right">
		<!--<button class="btn blue-btn">儲存</button>-->
		<!--<a href="{{url('tasks')}}" class="btn blue-btn">取消</a>-->
		</div>
		
</div>

<!--<script>
var style1 = '{{$task->style_1}}';
for(style in style1){
    $('input[value='+style1[style]+']').prop("checked", true);
} 
</script>-->


        <div class="row" style="margin:20px 60px 10px 60px;">
            <label class="small" style="float:left,">複選</label>
            <div class="btn-group" data-toggle="buttons">
                <!--@foreach($style1 as $s)
                {{$s}}
                @endforeach-->

                
                <label class="btn btn-primary @foreach($style1 as $s) @if($s =="早餐") active @endif @endforeach">
                    <input type="checkbox" name="style_1[]" id="option1" autocomplete="off" value="早餐"@foreach($style1 as $s)  @if($s =="早餐")  checked="checked" @endif @endforeach> 早餐
                </label>
                
                <label class="btn btn-primary @foreach($style1 as $s) @if($s =="午餐") active @endif @endforeach">
                    <input type="checkbox" name="style_1[]" id="option1" autocomplete="off" value="午餐"@foreach($style1 as $s)  @if($s =="午餐")  checked="checked" @endif @endforeach> 午餐
                </label>
                <label class="btn btn-primary @foreach($style1 as $s) @if($s =="晚餐") active @endif @endforeach">
                    <input type="checkbox" name="style_1[]" id="option1" autocomplete="off" value="晚餐"@foreach($style1 as $s)  @if($s =="晚餐")  checked="checked" @endif @endforeach> 晚餐
                </label>
                <label class="btn btn-primary @foreach($style1 as $s) @if($s =="點心") active @endif @endforeach">
                    <input type="checkbox" name="style_1[]" id="option1" autocomplete="off" value="點心"@foreach($style1 as $s)  @if($s =="點心")  checked="checked" @endif @endforeach> 點心
                </label>
            </div>
        </div>
        <div class="row" style="margin:20px 60px 10px 60px;">
            <label class="small" style="float:left,">複選</label>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary @foreach($style2 as $s) @if($s =="中式料理") active @endif @endforeach">
                    <input type="checkbox" name="style_2[]" id="option1" autocomplete="off" value="中式料理"@foreach($style2 as $s)  @if($s =="中式料理")  checked="checked" @endif @endforeach> 中式料理
                </label>
                <label class="btn btn-primary @foreach($style2 as $s) @if($s =="亞洲料理") active @endif @endforeach">
                    <input type="checkbox" name="style_2[]" id="option1" autocomplete="off" value="亞洲料理"@foreach($style2 as $s)  @if($s =="亞洲料理")  checked="checked" @endif @endforeach> 亞洲料理
                </label>
                <label class="btn btn-primary @foreach($style2 as $s) @if($s =="歐美澳洲料理") active @endif @endforeach">
                    <input type="checkbox" name="style_2[]" id="option1" autocomplete="off" value="歐美澳洲料理"@foreach($style2 as $s)  @if($s =="歐美澳洲料理")  checked="checked" @endif @endforeach> 歐美澳洲料理
                </label>
                <label class="btn btn-primary @foreach($style2 as $s) @if($s =="異國料理") active @endif @endforeach">
                    <input type="checkbox" name="style_2[]" id="option1" autocomplete="off" value="異國料理"@foreach($style2 as $s)  @if($s =="異國料理")  checked="checked" @endif @endforeach> 異國料理
                </label>
                <label class="btn btn-primary @foreach($style2 as $s) @if($s =="懶人料理") active @endif @endforeach">
                    <input type="checkbox" name="style_2[]" id="option1" autocomplete="off" value="懶人料理"@foreach($style2 as $s)  @if($s =="懶人料理")  checked="checked" @endif @endforeach> 懶人料理
                </label>
                <label class="btn btn-primary @foreach($style2 as $s) @if($s =="創意料理") active @endif @endforeach">
                    <input type="checkbox" name="style_2[]" id="option1" autocomplete="off" value="創意料理"@foreach($style2 as $s)  @if($s =="創意料理")  checked="checked" @endif @endforeach> 創意料理
                </label>
                <label class="btn btn-primary @foreach($style2 as $s) @if($s =="養生料理") active @endif @endforeach">
                    <input type="checkbox" name="style_2[]" id="option1" autocomplete="off" value="養生料理"@foreach($style2 as $s)  @if($s =="養生料理")  checked="checked" @endif @endforeach> 養生料理
                </label>
            </div>
        </div>
        <div class="row" style="margin:20px 60px 10px 60px;">
            <label class="small" style="float:left,">單選</label>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary @foreach($style3 as $s) @if($s =="素食") active @endif @endforeach">
                    <input type="checkbox" name="style_3[]" id="option1" autocomplete="off" value="素食"@foreach($style3 as $s)  @if($s =="素食")  checked="checked" @endif @endforeach> 素食
                </label>
                <label class="btn btn-primary @foreach($style3 as $s) @if($s =="非素食") active @endif @endforeach">
                    <input type="checkbox" name="style_3[]" id="option1" autocomplete="off" value="非素食"@foreach($style3 as $s)  @if($s =="非素食")  checked="checked" @endif @endforeach> 非素食
                </label>
                <label class="btn btn-primary @foreach($style3 as $s) @if($s =="純肉") active @endif @endforeach">
                    <input type="checkbox" name="style_3[]" id="option1" autocomplete="off" value="純肉"@foreach($style3 as $s)  @if($s =="純肉")  checked="checked" @endif @endforeach> 純肉
                </label>
                <label class="btn btn-primary @foreach($style3 as $s) @if($s =="海鮮") active @endif @endforeach">
                    <input type="checkbox" name="style_3[]" id="option1" autocomplete="off" value="海鮮"@foreach($style3 as $s)  @if($s =="海鮮")  checked="checked" @endif @endforeach> 海鮮
                </label>
                <label class="btn btn-primary @foreach($style3 as $s) @if($s =="米麵澱粉類主食") active @endif @endforeach">
                    <input type="checkbox" name="style_3[]" id="option1" autocomplete="off" value="米麵澱粉類主食"@foreach($style3 as $s)  @if($s =="米麵澱粉類主食")  checked="checked" @endif @endforeach> 米麵澱粉類主食
                </label>
                <label class="btn btn-primary @foreach($style3 as $s) @if($s =="羹湯") active @endif @endforeach">
                    <input type="checkbox" name="style_3[]" id="option1" autocomplete="off" value="羹湯"@foreach($style3 as $s)  @if($s =="羹湯")  checked="checked" @endif @endforeach> 羹湯
                </label>
                <label class="btn btn-primary @foreach($style3 as $s) @if($s =="乾果與水果") active @endif @endforeach">
                    <input type="checkbox" name="style_3[]" id="option1" autocomplete="off" value="乾果與水果"@foreach($style3 as $s)  @if($s =="乾果與水果")  checked="checked" @endif @endforeach> 乾果與水果
                </label>
                <label class="btn btn-primary @foreach($style3 as $s) @if($s =="醬料製作") active @endif @endforeach">
                    <input type="checkbox" name="style_3[]" id="option1" autocomplete="off" value="醬料製作"@foreach($style3 as $s)  @if($s =="醬料製作")  checked="checked" @endif @endforeach> 醬料製作
                </label>
                 <label class="btn btn-primary @foreach($style3 as $s) @if($s =="其他") active @endif @endforeach">
                    <input type="checkbox" name="style_3[]" id="option1" autocomplete="off" value="其他"@foreach($style3 as $s)  @if($s =="其他")  checked="checked" @endif @endforeach> 其他
                </label>
            </div>
        </div>
<div class="row" style="border:2px solid #000033;margin: 20px 60px 10px 40px;">

<div class="form-group">
        <label for="inputFoodname" class="col-sm-2 control-label" style="margin-top: 5px;"required>料理名稱 :<!--Email--></label>
        <div class="col-sm-10">
          <input name="name" type="text" class="form-control" id="inputFoodname" placeholder="" style="background: transparent;border:none;color:#000033;    font-weight: bold;" value="{{$task->name}}" required>
        </div>
        </div>
      </div>
      <div class="row" style="border:2px solid #000033;margin: 20px 60px 10px 40px;">
<div class="form-group">
      <label for="inputurl" class="col-sm-2 control-label" style="margin-top: 5px;">請貼上影片網址 :<!--Email--></label>
        <div class="col-sm-10">
          <input name="video_url" type="text" class="form-control" id="youtube_url" value="{{$task->video_url}}" placeholder="" style="background: transparent;border:none;color:#000033;    font-weight: bold;" required pattern="^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*"  data-parsley-pattern-message="請輸入Youtube網址" onchange='getYoutubeId()'>
        </div>
    </div>
</div>
	
<div class="row" style="margin:0px 60px 50px 40px;">
	<!--<input name="food_pic" type='file' class="upl">
    
				<div class="col-md-6"style="padding:0px">

<div>
        <img class="preview" style="width: 500px; height: 400px;">
        <div class="size"></div>
    </div>
				</div>-->
				<div id='myyoutube' class="col-md-6"style="padding:0px">
                    <iframe width="560" height="400" src="//www.youtube.com/embed/{{$task->video_url}}" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="col-md-6"style="padding:0px;background:white;height:400px;overflow: auto;">
					<div style="margin:30px 50px 20px 30px">
					<div class="row"style="line-height: 2;margin:4px 0px;"><div class="col-md-3">烹調時間: </div><input name="cooktime" style="height: 34px;"class="col-md-4"type="text" value="{{$task->cooktime}}" required data-parsley-type="integer"></input>分</div>
					<div class="row"style="line-height: 2;margin:4px 0px;"><div class="col-md-3">份量: </div><input name="portion" style="height: 34px;"class="col-md-4"type="text" value="{{$task->portion}}" required data-parsley-type="integer"></input> 人份</div>

					<div class="row"style="line-height: 2;margin:4px 0px;">
						<div class="col-md-3">食材:</div>
					<div id="foodBasiclist" class="col-md-9" style="margin-left:px;">
            <div class="foodBasicgroup row">
            @foreach ($ingredients as $ingredient)
            <input name="ingridient[]" style="height: 34px;margin:4px 6px 4px 0px" class="col-md-5" type="text" value="{{$ingredient->name}}" placeholder="食材名稱">
            <input name="quantity[]" style="height: 34px;margin:4px 0px 4px 6px" class="col-md-5" type="text" value="{{$ingredient->quantity}}" placeholder="份量">
            @endforeach
            </div>

						
					</div>
					</div>
					<div class="row">
						<button type="button" class="btn blue-btn col-md-offset-3 col-md-8"style="margin-left: 24%;"onclick="addBasicfood()">新增食材</button>
					</div>
					
				</div>
				</div>				
			</div>
			<div class="row" style="border:2px solid #000033;margin: 20px 60px 40px 40px;">
<div class="form-group"style="margin:0px">
        <div class="">
          <textarea name="shortintro" rows="5"class="form-control" id="" placeholder="關於這道料理的介紹(可略)" style="background: transparent;border:none;color:#000033;font-weight: bold;width:100%">{{$task->shortintro}}</textarea>
        </div>
      </div>
	</div>
</div>


<div class="container" style="margin-top:50px;">
	<div class="row">
<textarea name='tip' style="border:solid 2px black;width:100%" rows="2"  placeholder="小撇步:">{{$task->tip}}</textarea>
</div>
</div>
<input name="task_type" type="hidden" value="v">
<div class="container" style="margin-top:50px;    text-align: -webkit-center;">
<button type="submit" class="btn blue-btn" style="">發布</button>
<a href="{{URL::asset('tasks').'/'.$task->id}}" class="btn blue-btn">取消</a>
</div>
</div>
</form>
@endsection