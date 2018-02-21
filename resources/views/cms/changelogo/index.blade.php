@extends('cms/layouts.app') 
@section('content')

<script
    src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script
    src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div role="tabpanel" class="tab-pane text-center" id="profile">
                    <form role="form" action="{{url('cms/logochangepic')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="exampleInputFile">檔案上傳</label>
                            <input name="logo_pic" type='file' class="upl">
                                <div><img class="preview" style="width: 1200px; height: 200px;" src="{{URL::asset('logo-upload').'/'.$logo[0]->img}}"></div>

                        </div>
                        <button type="submit" class="btn btn-default">送出</button>
                    </form>
                </div>


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
@endsection