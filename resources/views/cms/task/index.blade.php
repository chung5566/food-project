@extends('cms/layouts.app') 
@section('content')
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="center">
  <div class="container " style="width:100%">

		{{ csrf_field() }}
		<div class="table-responsive text-center">
			<table class="table table-borderless" id="table">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Name</th>
						<th class="text-center">發文者</th>
						<th class="text-center">created at</th>
						<th class="text-center">封面圖</th>
						<th class="text-center">類型</th>
						<th class="text-center">瀏覽量</th>
						
					</tr>
				</thead>
				@foreach($tasks as $task)
				<tr class="item{{$task->id}}">
					<td>{{$task->id}}</td>
					<td>{{$task->name}}</td>
					<td>temp</td>
					<td>{{$task->created_at}}</td>
					<td>
						@if($task->article_type=='p')
                                <img width="50px" height="50px" data-src="{{ $task->img_url }}"  src="<?php echo url('foodpic-upload')?>/{{$task->img_url}}" data-holder-rendered="true" style="display: block;">
                          @else
                          <img width="50px" height="50px" data-src="{{ $task->img_url }}"  src="{{ $task->img_url }}" data-holder-rendered="true" style="display: block;">
						@endif
					</td>
					<td>{{$task->article_type}}</td>
					<td>{{$task->popular}}</td>

					<td><a href="{{url('tasks/')}}/{{$task->id}}" class="edit-modal btn btn-info" 
							 >
							<span class="glyphicon glyphicon-edit"></span> 預覽
						</a>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg{{$task->id}}">預覽留言</button>
						<button class="delete-modal-task btn btn-danger"
							data-id="{{$task->id}}" data-name="{{$task->name}}" >
							<span class="glyphicon glyphicon-trash"></span> Delete
						</button></td>
				</tr>
<div class="modal fade bs-example-modal-lg{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  	
    <div class="modal-content">
    	<h1>留言板</h1>
      @foreach($task->comments as $comment)
      <div class="row item_comment{{$comment->id}}" style="margin:2px">
      	<div class="col-md-2">
      		{{$comment->user_id}}
      	</div>
      	<div class="col-md-8">
      		{{$comment->content}}
      	</div>
      	<div class="col-md-2 delete-modal-comment">
      		<button class="delete-modal btn btn-danger delete"
							data-id="{{$comment->id}}"  >
							<span class="glyphicon glyphicon-trash"></span> Delete
						</button>
      	</div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endforeach
			</table>
		</div>
	</div>


</div>
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="control-label col-sm-2" for="id">ID:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fid" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Name:</label>
							<div class="col-sm-10">
								<input type="name" class="form-control" id="n">
							</div>
						</div>
					</form>
					<div class="deleteContent">
						Are you Sure you want to delete <span class="dname"></span> ? <span
							class="hidden did"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button" class='glyphicon'> </span>
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
$(function() {

    $(document).on('click', '.delete-modal-task', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });


    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: 'cms_memberdelete',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
        $('.delete-modal-comment').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: 'cms_commentdelete',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).data('id')
            },
            success: function(data) {
            	
                $('.item_comment'+$(this).data('id')).remove();
            }
        });
    });
});
</script>



@endsection