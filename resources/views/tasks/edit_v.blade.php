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

                <label class="btn btn-primary @if ('早餐'== $task->style_1) active @endif">
                    <input type="checkbox" name="style_1" id="option1" autocomplete="off" value="早餐" @if ('早餐'== $task->style_1) checked="checked" @endif> 早餐
                </label>
                <label class="btn btn-primary @if ('午餐'== $task->style_1) active @endif">
                    <input type="checkbox" name="style_1" id="option2" autocomplete="off" value="午餐" @if ('午餐'== $task->style_1) checked="checked" @endif> 午餐
                </label>
                <label class="btn btn-primary @if ('晚餐'== $task->style_1) active @endif">
                    <input type="checkbox" name="style_1" id="option3" autocomplete="off" value="晚餐" @if ('晚餐'== $task->style_1) checked="checked" @endif> 晚餐
                </label>
            </div>
        </div>
        <div class="row" style="margin:20px 60px 10px 60px;">
            <label class="small" style="float:left,">複選</label>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary @if ('中式料理'== $task->style_2) active @endif">
                    <input type="checkbox" name="style_2" id="option1" autocomplete="off" value="中式料理" @if ('中式料理'== $task->style_2) checked="checked" @endif> 中式料理
                </label>
                <label class="btn btn-primary  @if ('亞洲料理'== $task->style_2) active @endif">
                    <input type="checkbox" name="style_2" id="option2" autocomplete="off" value="亞洲料理" @if ('亞洲料理'== $task->style_2) checked="checked" @endif> 亞洲料理
                </label>
                <label class="btn btn-primary  @if ('歐美澳洲料理'== $task->style_2) active @endif">
                    <input type="checkbox" name="style_2" id="option3" autocomplete="off" value="歐美澳洲料理" @if ('歐美澳洲料理'== $task->style_2) checked="checked" @endif> 歐美澳洲料理
                </label>
                <label class="btn btn-primary @if ('異國料理料理'== $task->style_2) active @endif">
                    <input type="checkbox" name="style_2" id="option4" autocomplete="off" value="異國料理" @if ('異國料理'== $task->style_2) checked="checked" @endif> 異國料理
                </label>
                <label class="btn btn-primary @if ('懶人料理料理'== $task->style_2) active @endif">
                    <input type="checkbox" name="style_2" id="option5" autocomplete="off" value="懶人料理" @if ('懶人料理'== $task->style_2) checked="checked" @endif> 懶人料理
                </label>
                <label class="btn btn-primary @if ('創意料理料理'== $task->style_2) active @endif">
                    <input type="checkbox" name="style_2" id="option6" autocomplete="off" value="創意料理" @if ('創意料理'== $task->style_2) checked="checked" @endif> 創意料理
                </label>
                <label class="btn btn-primary @if ('養生料理料理'== $task->style_2) active @endif">
                    <input type="checkbox" name="style_2" id="option7" autocomplete="off" value="養生料理" @if ('養生料理'== $task->style_2) checked="checked" @endif> 養生料理
                </label>
            </div>
        </div>
        <div class="row" style="margin:20px 60px 10px 60px;">
            <label class="small" style="float:left,">單選</label>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary @if ('素食料理'== $task->style_3) active @endif">
                    <input type="radio" name="style_3" id="option1" autocomplete="off" value="素食" @if ('素食'== $task->style_3) checked="checked" @endif> 素食
                </label>
                <label class="btn btn-primary @if ('非素食'== $task->style_3) active @endif">
                    <input type="radio" name="style_3" id="option2" autocomplete="off" value="非素食" @if ('非素食'== $task->style_3) checked="checked" @endif> 非素食
                </label>
                <label class="btn btn-primary @if ('純肉'== $task->style_3) active @endif">
                    <input type="radio" name="style_3" id="option3" autocomplete="off" value="純肉" @if ('純肉'== $task->style_3) checked="checked" @endif> 純肉
                </label>
                <label class="btn btn-primary @if ('海鮮'== $task->style_3) active @endif">
                    <input type="radio" name="style_3" id="option4" autocomplete="off" value="海鮮" @if ('海鮮'== $task->style_3) checked="checked" @endif> 海鮮
                </label>
                <label class="btn btn-primary @if ('米麵澱粉類主食'== $task->style_3) active @endif">
                    <input type="radio" name="style_3" id="option5" autocomplete="off" value="米麵澱粉類主食" @if ('海鮮'== $task->style_3) checked="checked" @endif> 米麵澱粉類主食
                </label>
                <label class="btn btn-primary @if ('乾果與水果'== $task->style_3) active @endif">
                    <input type="radio" name="style_3" id="option6" autocomplete="off" value="乾果與水果" @if ('乾果與水果'== $task->style_3) checked="checked" @endif> 乾果與水果
                </label>
                <label class="btn btn-primary @if ('醬料製作'== $task->style_3) active @endif">
                    <input type="radio" name="style_3" id="option7" autocomplete="off" value="醬料製作" @if ('醬料製作'== $task->style_3) checked="checked" @endif> 醬料製作
                </label>
                 <label class="btn btn-primary @if ('其他'== $task->style_3) active @endif">
                    <input type="radio" name="style_3" id="option8" autocomplete="off" value="其他" @if ('其他'== $task->style_3) checked="checked" @endif> 其他
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
          <input name="video_url" type="text" class="form-control" id="youtube_url" value="https://youtu.be/{{$task->video_url}}" placeholder="" style="background: transparent;border:none;color:#000033;    font-weight: bold;" required pattern="^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*"  data-parsley-pattern-message="請輸入Youtube網址" onchange='getYoutubeId()'>
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
<a href="{{url('tasks')}}" class="btn blue-btn">取消</a>
</div>
</div>
</form>
@endsection