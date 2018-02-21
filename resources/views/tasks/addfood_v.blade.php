@extends('layouts.app')

@section('content')
<link href=dist/css/food.css rel=stylesheet>
<form data-parsley-validate action="{{url('tasks')}}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_token" value = "{{csrf_token()}}">
<div class="container" style="background: #e8e8e8;" >
	<div class='row' style="margin:20px 60px 10px 60px;">
		<div class="btn-group" style="float:right">
		<!--<button class="btn blue-btn">儲存</button>-->
		<a href="{{url('tasks')}}" class="btn blue-btn">取消</a>
		</div>
		
</div>
                <div class="row" style="margin:20px 60px 10px 60px;">
            <label class="small" style="float:left,">複選</label>
            <div class="btn-group" data-toggle="buttons">

                <label class="btn btn-primary active">
                    <input type="checkbox" name="style_1[]" id="option1" autocomplete="off" value="早餐" checked> 早餐
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_1[]" id="option2" autocomplete="off" value="午餐"> 午餐
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_1[]" id="option3" autocomplete="off" value="晚餐"> 晚餐
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_1[]" id="option3" autocomplete="off" value="點心"> 點心
                </label>
            </div>
        </div>
        <div class="row" style="margin:20px 60px 10px 60px;">
            <label class="small" style="float:left,">複選</label>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="checkbox" name="style_2[]" id="option1" autocomplete="off" value="中式料理" checked> 中式料理
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_2[]" id="option2" autocomplete="off" value="亞洲料理"> 亞洲料理
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_2[]" id="option3" autocomplete="off" value="歐美澳洲料理"> 歐美澳洲料理
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_2[]" id="option4" autocomplete="off" value="異國料理"> 異國料理
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_2[]" id="option5" autocomplete="off" value="懶人料理"> 懶人料理
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_2[]" id="option6" autocomplete="off" value="創意料理"> 創意料理
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_2[]" id="option7" autocomplete="off" value="養生料理"> 養生料理
                </label>
            </div>
        </div>
        <div class="row" style="margin:20px 60px 10px 60px;">
            <label class="small" style="float:left,">複選</label>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="checkbox" name="style_3[]" id="option1" autocomplete="off" value="素食" checked> 素食
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_3[]" id="option2" autocomplete="off" value="非素食"> 非素食
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_3[]" id="option3" autocomplete="off" value="純肉"> 純肉
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_3[]" id="option4" autocomplete="off" value="海鮮"> 海鮮
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_3[]" id="option5" autocomplete="off" value="米麵澱粉類主食"> 米麵澱粉類主食
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_3[]" id="option5" autocomplete="off" value="羹湯"> 羹湯
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_3[]" id="option6" autocomplete="off" value="乾果與水果"> 乾果與水果
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="style_3[]" id="option7" autocomplete="off" value="醬料製作"> 醬料製作
                </label>
                 <label class="btn btn-primary">
                    <input type="checkbox" name="style_3[]" id="option8" autocomplete="off" value="其他"> 其他
                </label>
            </div>
        </div>
<div class="row" style="border:2px solid #000033;margin: 20px 60px 10px 40px;">

<div class="form-group">
        <label for="inputFoodname" class="col-sm-2 control-label" style="margin-top: 5px;text-align: right;padding-right:0px"required>料理名稱 :<!--Email--></label>
        <div class="col-sm-10" style="padding-left:0px;">
          <input name="name" type="text" class="form-control" id="inputFoodname" placeholder="" style="background: transparent;border:none;color:#000033;    font-weight: bold;"required>
        </div>
        </div>
      </div>
      <div class="row" style="border:2px solid #000033;margin: 20px 60px 10px 40px;">
<div class="form-group">
      <label for="inputurl" class="col-sm-2 control-label" style="margin-top: 5px;text-align: right;padding-right:0px">請貼上影片網址 :<!--Email--></label>
        <div class="col-sm-10" style="padding-left:0px;">
          <!--<input name="video_url" type="text" class="form-control" id="youtube_url" placeholder="" style="background: transparent;border:none;color:#000033;    font-weight: bold;" required pattern="^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*"  data-parsley-pattern-message="請輸入Youtube網址" onchange='getYoutubeId()'>-->
          <input name="video_url" type="text" class="form-control" id="youtube_url" placeholder="" style="background: transparent;border:none;color:#000033;    font-weight: bold;" required  data-parsley-pattern-message="請輸入網址" onchange='getYoutubeId()'>
       
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
				</div>
				<div class="col-md-6"style="padding:0px;background:white;height:400px;overflow: auto;">
					<div style="margin:30px 50px 20px 30px">
					<div class="row"style="line-height: 2;margin:4px 0px;"><div class="col-md-3">烹調時間: </div><input name="cooktime" style="height: 34px;"class="col-md-4"type="text" required data-parsley-type="integer"></input>分</div>
					<div class="row"style="line-height: 2;margin:4px 0px;"><div class="col-md-3">份量: </div><input name="portion" style="height: 34px;"class="col-md-4"type="text" required data-parsley-type="integer"></input> 人份</div>

					<div class="row"style="line-height: 2;margin:4px 0px;">
						<div class="col-md-3">食材:</div>
					<div id="foodBasiclist" class="col-md-9" style="margin-left:px;">
            <div class="foodBasicgroup row">
            <input name="ingridient[]" style="height: 34px;margin:4px 6px 4px 0px" class="col-md-5" type="text" placeholder="食材名稱">
            <input name="quantity[]" style="height: 34px;margin:4px 0px 4px 6px" class="col-md-5" type="text" placeholder="份量">
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
          <textarea name="shortintro" rows="5"class="form-control" id="" placeholder="關於這道料理的介紹(可略)" style="background: transparent;border:none;color:#000033;font-weight: bold;width:100%"></textarea>
        </div>
      </div>
	</div>
</div>


<div class="container" style="margin-top:50px;">
	<div class="row">
<textarea name='tip' style="border:solid 2px black;width:100%" rows="2"  placeholder="小撇步:"></textarea>
</div>
</div>
<input name="task_type" type="hidden" value="v">
<div class="container" style="margin-top:50px;    text-align: -webkit-center;">
<button type="submit" class="btn blue-btn" style="">發布</button>
</div>
</div>
</form>
@endsection