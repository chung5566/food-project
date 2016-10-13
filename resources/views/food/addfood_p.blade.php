@extends('layouts.app')

@section('content')
<link href=dist/css/food.css rel=stylesheet>
<form action="{{url('tasks')}}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_token" value = "{{csrf_token()}}">
<div class="container" style="background: #e8e8e8;" >
	<div class='row' style="margin:20px 60px 10px 60px;">
		<div class="btn-group" style="float:right">
		<button class="btn blue-btn">儲存</button>
		<button class="btn blue-btn">取消</button>
		</div>
		
</div>
<div class="row" style="border:2px solid #000033;margin: 20px 60px 10px 40px;">
<div class="form-group">
        <label for="inputFoodname" class="col-sm-2 control-label" style="margin-top: 5px;">料理名稱 :<!--Email--></label>
        <div class="col-sm-10">
          <input name="name" type="text" class="form-control" id="inputFoodname" placeholder="" style="background: transparent;border:none;color:#000033;    font-weight: bold;">
        </div>
      </div>
	</div>
<div class="row" style="margin:0px 60px 50px 40px;">
	<input name="food_pic" type='file' class="upl">
    
				<div class="col-md-6"style="padding:0px">

<div>
        <img class="preview" style="width: 500px; height: 400px;">
        <div class="size"></div>
    </div>
				</div>
				<div class="col-md-6"style="padding:0px;background:white;height:400px;overflow: auto;">
					<div style="margin:30px 50px 20px 30px">
					<div class="row"style="line-height: 2;margin:4px 0px;"><div class="col-md-3">烹調時間: </div><input name="cooktime" style="height: 34px;"class="col-md-4"type="text"></input>分</div>
					<div class="row"style="line-height: 2;margin:4px 0px;"><div class="col-md-3">份量: </div><input name="portion" style="height: 34px;"class="col-md-4"type="text"></input> 人份</div>

					<div class="row"style="line-height: 2;margin:4px 0px;">
						<div class="col-md-3">食材:</div>
					<div id="foodBasiclist" class="col-md-9" style="margin-left:px;">
						<div class="foodBasicgroup row">
						<input name="ingridient[]" style="height: 34px;margin:4px 6px 4px 0px" class="col-md-5" type="text" placeholder="食材名稱">
						<input name="quantity[]" style="height: 34px;margin:4px 0px 4px 6px" class="col-md-5" type="text" placeholder="份量">
						</div>
						<div class="foodBasicgroup row">
						<input name="ingridient[]" style="height: 34px;margin:4px 6px 4px 0px" class="col-md-5" type="text" placeholder="食材名稱">
						<input name="quantity[]" style="height: 34px;margin:4px 0px 4px 6px" class="col-md-5" type="text" placeholder="份量">
						</div>
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
          <textarea name="shortintro" rows="5"class="form-control" id="" placeholder="簡介:輸入料理介紹" style="background: transparent;border:none;color:#000033;font-weight: bold;width:100%"></textarea>
        </div>
      </div>
	</div>
</div>
<div id="addFoodintrolist" class="container" style="margin-top:60px">
<div class="row food_pic_intro" style="margin-bottom:30px">
	<input  type='file' class="upl col-md-12"  >
    
				
                    <div class="col-md-5">
                        <!-- 4:3 aspect ratio -->
                    <img class="preview" style="width: 400px; height: 300px;">    
                  </div>
                    <div class="col-md-7">
                        <h3 class="add_Foodintro_count"><strong>1</strong></h3><h3>
                        <textarea name="intro[]" rows="4" style="width:100%" placeholder="文字說明:"></textarea></h3></div>
</div>
<div class="row food_pic_intro" style="margin-bottom:30px">
	<input type='file' class="upl col-md-12">
    
				
				
                    <div class="col-md-5">
                        <!-- 4:3 aspect ratio -->
                    <img class="preview" style="width: 400px; height: 300px;">    
                  </div>
                    <div class="col-md-7">
                        <h3 class="add_Foodintro_count"><strong>2</strong></h3><h3>
                        <textarea name="intro[]" rows="4" style="width:100%" placeholder="文字說明:"></textarea></h3></div>
</div>	
</div>
<div class="container">
<div class="row " style="float:right;margin-right: 5px;"><button type="button" class="btn blue-btn" onclick="addFoodintro()">新增下一步</button></div>
</div>

<div class="container" style="margin-top:50px;">
	<div class="row">
<textarea name='tip' style="border:solid 2px black;width:100%" rows="2"  placeholder="小撇步:"></textarea>
</div>
</div>
<input name="task_type" type="hidden" value="p">
<div class="container" style="margin-top:50px;    text-align: -webkit-center;">
<button type="submit" class="btn blue-btn" style="">送出</button>
</div>
</div>
</form>
@endsection