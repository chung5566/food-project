@extends('layouts.schoolapp')

@section('content')
<link href={{ URL::asset('dist/css/school/schooladd.css')}} rel=stylesheet>

<div class="container" style="width:50%;text-align: center;background:#eeeeee">
		<h2 class="bold inform">開課資訊</h2>
		<div class="row">
<a href="http://127.0.0.1/food-project/public/tasks" class="btn blue-btn" id="cancel">取消</a>
		</div>
<form data-parsley-validate action="{{url('school')}}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{csrf_token()}}">


<div class="form-group">
        <label for="schoolname">開課名稱<!--Email address--></label>
        <input type="" class="form-control" name="schoolname"id="schoolname" placeholder="輸入料理教室名稱" required>
      </div>

<div class="form-group">
        <label for="main-pic">照片上傳<!--File input--></label>
<input style="margin: auto;" id="main-pic" name="school_pic" type="file" class="upl uplll"  required>
        <div>
<img class="preview" style="width: 300px; height: 200px;">
</div>
      </div>


<div class="form-group">
  <label for="school_date">上課時間</label>
      <input name="school_date" id="school_date" class="form-control" rows="3" placeholder="輸入上課時間" required></input>
  </div>
<div class="form-group">
  <label for="school_people">上課人數</label>
      <input name="people" id="school_people" class="form-control" rows="3" placeholder="輸入上課人數" required></input>
  </div>

<div class="form-group">
	<label for="school_intro">課程介紹</label>
      <textarea name="school_intro" id="school_intro" class="form-control" rows="3" placeholder="輸入課程介紹" required></textarea>
  </div>

<div class="form-group">
        <label for="schooladdress">上課地址</label>
        <input type="" class="form-control" name="schooladdress" id="schooladdress" placeholder="輸入上課地址" required>
      </div>

<div class="form-group">
        <label for="schoolmoney">費用</label>
        <input type="" class="form-control" name="money" id="schoolmoney" placeholder="輸入費用" required> 
      </div>

<div class="form-group">
        <label for="schoolelement">自備材料</label>
        <input type="" class="form-control" name="ingredient" id="schoolelement" placeholder="輸入需要自備的材料">
      </div>
<div class="form-group">
        <label for="schooldiscount">積分可扣抵</label>
        <input type="" class="form-control" name="discount" id="schooldiscount" placeholder="輸入積分可折扣多少">
      </div>
<div class="form-group">
	<label for="schoolwarning">注意事項</label>
      <textarea id="schoolwarning" name="warnning" class="form-control" rows="3" placeholder="輸入注意事項"></textarea>
  </div>
<div class="form-group">
  <label for="schoolstopdate">報名截止日</label>
      <input id="schoolstopdate" name="stopdate" class="form-control" rows="3" placeholder="2016/09/30"></input>
  </div>

  <div class="form-group">
  	<button id="letjoin" type="submit" class="btn">開課申請</button>
  </div>

</form>


</div>







@endsection