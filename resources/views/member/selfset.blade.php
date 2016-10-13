@extends('layouts.app')

@section('content')



<div class=container style="margin-top:40px">
    <div class="row">
        <div class="col-md-3">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-stacked nav-pills" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">基本資料</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">頭像設置</a></li>
                    <li role="presentation"><a href="#selfintro" aria-controls="selfintro" role="tab" data-toggle="tab">自我介紹</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">密碼修改</a></li>
                </ul>
                <!-- Tab panes -->
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <form action="{{url('userchange')}}" method="POST" class="form-horizontal" role="form">
                        <input type="hidden" name="_token" value = "{{csrf_token()}}">

                        <div class="form-group">
                            <label for="nickname" class="col-sm-4 control-label">暱稱</label>
                            <div class="col-sm-6">
                                <input name="name" type="name" class="form-control" id="nickname" placeholder="輸入暱稱" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">電子郵件</label>
                            <div class="col-sm-6">
                                <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="輸入電子郵件" value="{{$user->email}}" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-sm-4 control-label">性別</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="gender" value="{{$user->gender}}">
                                    <option disabled>請選擇</option>
                                    <option>男</option>
                                    <option>女</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dtp_input2" class="col-sm-4 control-label">生日</label>
                            <div class="col-sm-6">
                                <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input name="birth" class="form-control" size="4" type="text" value="{{$user->birth}}" readonly="">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                            <input type="hidden" id="dtp_input2" value="{{$user->birth}}">
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="country" class="col-sm-4 control-label">區域</label>
                            <div class="col-sm-6">
                                <input name="country" type="text" id="country" value="{{$user->country}}">
                                <input type="hidden" id="country_code" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">
                                <button type="submit" class="btn btn-default">送出</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane text-center" id="profile">
                    <img class="preview" style="width: 500px; height: 400px;" src="{{URL::asset('user-upload').'/'.$user->user_img}}">
                    <form role="form" action="{{url('userchangepic')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="size"></div>
                        <div class="form-group">
                            <label for="exampleInputFile">檔案上傳</label>
                            <input name="user_pic" type='file' class="upl">
                            <p class="help-block">上傳頭貼可以獲得積分喔</p>
                        </div>
                        <button type="submit" class="btn btn-default">送出</button>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane text-center" id="selfintro">
                    <form role="form" action="{{url('userchangeintro')}}" method="POST" enctype="multipart/form-data">
                        <h1>自我介紹</h1>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <br>
                        <textarea name="self_intro" class="form-control" rows="10" placeholder="填入自我介紹" value="{{$user->selfintro}}">{{$user->selfintro}}</textarea>
                        <br><br>
                        <button type="submit" class="btn btn-default">送出</button>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane text-center" id="messages">
                    <form role="form " data-toggle="validator">
                        <div class="form-group col-md-6 col-md-offset-3">
                            <label for="inputPassword" class="control-label">Password</label>
                            <div class="form-group ">
                                <input type="password" data-minlength="6" class="form-control" id="oldinputPassword" placeholder="輸入舊密碼" required>
                                <div class="help-block">至少六個字</div>
                            </div>
                            <div class="form-group ">
                                <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="輸入新密碼" required>
                                <div class="help-block">至少六個字</div>
                            </div>
                            <div class="form-group ">
                                <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="確認新密碼" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


 

@endsection