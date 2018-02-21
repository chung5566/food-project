@extends('layouts.productapp') 
@section('content')

<link href="{{ URL::asset('dist/css/food.css')}}" rel=stylesheet>
<form data-parsley-validate action="{{url('store_product')}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="container" style="background: #e8e8e8;">
        <div class='row' style="margin:20px 60px 10px 60px;">
            <div class="btn-group" style="float:right">
                <!--<button class="btn blue-btn">儲存</button>-->
                <a href="{{url('product')}}" class="btn blue-btn">取消</a>
            </div>
        </div>
        @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <div class="row" style="margin:20px 60px 10px 60px;">
            <label class="small" style="float:left,">單選</label>
            <div class="btn-group" data-toggle="buttons">

                <label class="btn btn-primary active">
                    <input type="radio" name="style" id="option1" autocomplete="off" value="達人手做" checked> 達人手做
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="style" id="option2" autocomplete="off" value="店家商品"> 店家商品
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="style" id="option3" autocomplete="off" value="好物評鑑"> 好物評鑑
                </label>

            </div>
        </div>


        <div class="row" style="border:2px solid #000033;margin: 20px 60px 10px 40px;">
            <div class="form-group">
                <label for="inputFoodname" class="col-sm-2 control-label" style="margin-top: 5px;text-align: right;padding-right:0px">商品名稱 :
                    <!--Email-->
                </label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" id="inputFoodname" placeholder="" style="background: transparent;border:none;color:#000033;    font-weight: bold;" required>
                </div>
            </div>
        </div>
        <div class="row" style="margin:0px 60px 50px 40px;">
            <input id="main-pic" name="product_pic" type='file' class="upl uplll"  onchange="validate_fileupload(this.value);"  required>
            <div class="col-md-6" style="padding:0px">
                <div>
                    <img class="preview" style="width: 500px; height: 400px;">
                    <div class="size"></div>
                </div>
            </div>
            <div class="col-md-6" style="padding:0px;background:white;height:400px;overflow: auto;">
                <div style="margin:30px 50px 20px 30px">
                    <div class="row" style="line-height: 2;margin:4px 0px;">
                        <div class="col-md-4">商品大小尺寸: </div>
                        <input name="size" style="height: 34px;" class="col-md-4" type="text" ></input>
                    </div>
                    <div class="row" style="line-height: 2;margin:4px 0px;">
                        <div class="col-md-4">商品保存期限: </div>
                        <input name="life" style="height: 34px;" class="col-md-4" type="text" ></input>
                    </div>
                    <div class="row" style="line-height: 2;margin:4px 0px;">
                        <div class="col-md-4">商品描述:</div>
                    
                        <div class="" id="foodBasiclist"  style="margin-left:px;">
                            <textarea name="description" style="height: 100px"  type="textarea" ></textarea>
                        </div>
                    </div>
                    <div class="row" style="line-height: 2;margin:4px 0px;">
                        <div class="col-md-4">自家賣場或網址: </div>
                        <input name="sell_url" style="height: 34px;" class="col-md-8" type="text" ></input>
                    </div>
                    <div class="row" style="line-height: 2;margin:4px 0px;">
                        <div class="col-md-4">聯絡方式: </div>
                        <input name="contact" style="height: 34px;" class="col-md-8" type="text" ></input>
                    </div>

                </div>
            </div>
        </div>
         

    </div>
    <div class="container">
    <div class="row" style="margin-top:30px">
            <div class="alert alert-info" role="alert">
                <a href="#" class="alert-link">本站僅提供刊登......</a>
            </div>
        </div> 
    </div>


    <div id="addFoodintrolist" class="container" style="margin-top:60px">

        <div class="row food_pic" style="margin-bottom:30px">
            <!--<input name="img_url[]" type='file' class="upl col-md-12">-->
            <input type="file" class="upl col-md-12" value="Edit Image" name="img_url[]"  multiple id="image">
            <div class="col-md-5">
                <!-- 4:3 aspect ratio -->
                <img  class="" style="width: 400px; height: 300px;">
            </div>
            <div class="col-md-7">
                <h3 class="add_Foodintro_count"><strong>1</strong></h3>
                <h3>
                        <textarea name="intro[]" rows="4" style="width:100%" placeholder="文字說明:"></textarea></h3>
                    </div>
        </div>

    </div>
    <div class="container">
        <div class="row " style="float:right;margin-right: 5px;">
            <button type="button" class="btn blue-btn" onclick="addFoodintro()">新增下一步</button>
        </div>
    </div>
 
    <div class="container" style="margin-top:50px;    text-align: -webkit-center;">
        <button type="submit" class="btn blue-btn" style="">發布</button>
    </div>
    </div>
</form>
<script type="text/javascript">
  function validate_fileupload(fileName)
{
    var allowed_extensions = new Array("jpg","png","gif");
    var file_extension = fileName.split('.').pop(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
            return true; // valid file extension
        }
    }

    return false;
}
</script>



<div class="modal fade" id="announce" tabindex="-1" role="dialog" aria-labelledby="announcement" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="announcement">公告事項</h4>
      </div>
      <div class="modal-body">
        <div id="announce_name">

        </div>
        <div id="announce_content">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<script>
$('#announce').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name') // Extract info from data-* attributes
  var content = button.data('content')
  var modal = $(this)
  modal.find('#announcement').text(name)
  modal.find('#announce_content').text(content)
})
</script>


@endsection