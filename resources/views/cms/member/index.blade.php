@extends('cms/layouts.app') 
@section('content')

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <ul class="stats_box">
  <li>
      <div class="sparkline bar_week"></div>
      <div class="stat_text">
    <strong>2.345</strong>Weekly Visit
    <span class="percent down"> <i class="fa fa-caret-down"></i> -16%</span>
      </div>
  </li>
  <li>
      <div class="sparkline line_day"></div>
      <div class="stat_text">
    <strong>165</strong>Daily Visit
    <span class="percent up"> <i class="fa fa-caret-up"></i> +23%</span>
      </div>
  </li>
  <li>
      <div class="sparkline pie_week"></div>
      <div class="stat_text">
    <strong>$2 345.00</strong>Weekly Sale
    <span class="percent"> 0%</span>
      </div>
  </li>
  <li>
      <div class="sparkline stacked_month"></div>
      <div class="stat_text">
    <strong>$678.00</strong>Monthly Sale
    <span class="percent down"> <i class="fa fa-caret-down"></i> -10%</span>
      </div>
  </li>
    </ul>
</div>
<hr>
<div class="center">

   <div class="container "style="width:100%">

		{{ csrf_field() }}
		<div class="table-responsive text-center">
			<table class="table table-borderless" id="table">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Name</th>
						<th class="text-center">Email</th>
						<th class="text-center">created at</th>
						<th class="text-center">updated at</th>
						<th class="text-center">gender</th>
						<th class="text-center">birth</th>
						<th class="text-center">country</th>
						<th class="text-center">identity</th>
						<th class="text-center">selfintro</th>
						<th class="text-center">point</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				@foreach($members as $member)
				<tr class="item{{$member->id}}">
					<td>{{$member->id}}</td>
					<td>{{$member->name}}</td>
					<td>{{$member->email}}</td>
					<td>{{$member->created_at}}</td>
					<td>{{$member->updated_at}}</td>
					<td>{{$member->gender}}</td>
					<td>{{$member->birth}}</td>
					<td>{{$member->country}}</td>
					<td>{{$member->identity}}</td>
					<!--<td><img data-src="holder.js/140x140" class="img-circle" alt="140x140" style="width: 50px; height: 50px;" src="{{URL::asset('user-upload').'/'.$member->user_img}}" data-holder-rendered="true">
</td>-->
					<td>{{$member->selfintro}}</td>
					<td>{{$member->point}}</td>
					<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-id={{$member->id}} data-name={{$member->name}} data-target="#exampleModal" data-whatever="{{$member->name}}">sendmailto{{$member->name}}</button>
					<button class="edit-modal btn btn-info" 
							data-id="{{$member->id}}" data-name="{{$member->name}}" data-email="{{$member->email}}" data-gender="{{$member->gender}}" data-birth="{{$member->birth}}" data-country="{{$member->country}}" data-identity="{{$member->identity}}" data-selfintro="{{$member->selfintro}}" data-point="{{$member->point}}">
							<span class="glyphicon glyphicon-edit"></span> Edit
						</button>
						<button class="delete-modal btn btn-danger"
							data-id="{{$member->id}}" data-name="{{$member->name}}" data-email="{{$member->email}}" data-gender="{{$member->gender}}" data-birth="{{$member->birth}}" data-country="{{$member->country}}" data-identity="{{$member->identity}}" data-selfintro="{{$member->selfintro}}" data-point="{{$member->point}}">
							<span class="glyphicon glyphicon-trash"></span> Delete
						</button></td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="cms_member/mailtomember">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Recipient:</label>
            <input name="recipient-name" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient_id" class="control-label">id:</label>
            <input name="recipient_id" type="input" class="form-control" id="recipient_id">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea name="message" class="form-control" id="message-text"></textarea>
          </div>
      
      <div class="modal-footer">
      	

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var recipient_id = button.data('id')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('input[name="recipient-name"]').val(recipient)
  modal.find('input[name="recipient_id"]').val(recipient_id)

})
</script>
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form" id="editform">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="control-label col-sm-2" for="id">ID:</label>
							<div class="col-sm-10">
								<input name="id" type="text" class="form-control" id="fid" value="" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Name:</label>
							<div class="col-sm-10">
								<input name="name" type="name" class="form-control" id="n">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">email:</label>
							<div class="col-sm-10">
								<input name="email" type="name" class="form-control" id="e">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="gender">gender:</label>
							<div class="col-sm-10">
								<input name="gender" type="name" class="form-control" id="g">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="birth">birth:</label>
							<div class="col-sm-10">
								<input name="birth" type="birth" class="form-control" id="b">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="country">country:</label>
							<div class="col-sm-10">
								<input name="country" type="country" class="form-control" id="c">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="identity">identity:</label>
							<div class="col-sm-10">
								<input name="identity" type="identity" class="form-control" id="i">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="selfintro">selfintro:</label>
							<div class="col-sm-10">
								<input name="selfintro" type="selfintro" class="form-control" id="s">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="point">point:</label>
							<div class="col-sm-10">
								<input name="point" type="point" class="form-control" id="p">
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
    
    
    
    <!--
    <a class="quick-btn" href="#">
  <i class="fa fa-signal fa-2x"></i>
  <span>warning</span>
  <span class="label label-warning">+25</span>
    </a>
    <a class="quick-btn" href="#">
  <i class="fa fa-external-link fa-2x"></i>
  <span>π</span>
  <span class="label btn-metis-2">3.14159265</span>
    </a>
    <a class="quick-btn" href="#">
  <i class="fa fa-lemon-o fa-2x"></i>
  <span>é</span>
  <span class="label btn-metis-4">2.71828</span>
    </a>
    <a class="quick-btn" href="#">
  <i class="fa fa-glass fa-2x"></i>
  <span>φ</span>
  <span class="label btn-metis-3">1.618</span>
    </a>-->

</div>
<hr>

<hr>
<div class="row">

</div>




	
<script>
$(function() {
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#e').val($(this).data('email'));
        $('#g').val($(this).data('gender'));
        $('#b').val($(this).data('birth'));
        $('#c').val($(this).data('country'));
        $('#i').val($(this).data('identity'));
        $('#s').val($(this).data('selfintro'));
        $('#p').val($(this).data('point'));
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
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
    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: 'cms_memberedit',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val(),
                'email':$('#e').val(),
                'gender':$('#g').val(),	
                'birth':$('#b').val(),
                'country':$('#c').val(),
                'identity':$('#i').val(),
                'selfintro':$('#s').val(),
                'point':$('#p').val(),
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.email + "</td><td>" + data.created_at + "</td><td>" + data.updated_at + "</td><td>" + data.gender + "</td><td>" + data.birth + "</td><td>" + data.country + "</td><td>" + data.identity + "</td><td>" + data.selfintro + "</td><td>" + data.point + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
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
});
</script>




@endsection