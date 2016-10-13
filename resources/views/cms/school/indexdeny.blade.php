@extends('cms/layouts.app') 
@section('content')
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="center">
	<div class="container" style="width:100%">

		{{ csrf_field() }}
		<div class="table-responsive text-center">
			<table class="table table-borderless" id="table">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Name</th>
						<th class="text-center">日期</th>
						<th class="text-center">簡介</th>
						<th class="text-center">地址</th>
						<th class="text-center">費用</th>
						<th class="text-center">自備材料</th>
						<th class="text-center">注意事項</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				@foreach($schools as $school)
				<tr class="item{{$school->id}}">
					<td>{{$school->id}}</td>
					<td>{{$school->school_name}}</td>
					<td>{{$school->school_date}}</td>
					<td>{{$school->intro}}</td>
					<td>{{$school->address}}</td>
					<td>{{$school->money}}</td>
					<td>{{$school->ingredient}}</td>
					<td>{{$school->warnning}}</td>

					<td><button data-toggle="modal" data-target="#previewModal" class="preview-modal btn btn-info" data-id="{{$school->id}}"
							data-name="{{$school->school_name}}" data-people='{{$school->people}}'
							data-date="{{$school->school_date}}" data-intro="{{$school->intro}}"
							data-address="{{$school->address}}" data-money="{{$school->money}}"
							data-ingredient="{{$school->ingredient}}" data-warnning="{{$school->warnning}}"
							data-stopdate="{{$school->stopdate}}" data-discount="{{$school->discount}}"
							data-img='{{$school->img_url}}'>
							<span class="glyphicon glyphicon-edit"></span> 預覽
						</button>
						<button class="edit-modal btn btn-info" data-id="{{$school->id}}"
							data-name="{{$school->school_name}}">
							<span class="glyphicon glyphicon-edit"></span> 同意
						</button>
						<button class="delete-modal btn btn-danger"
							data-id="{{$school->id}}" data-name="{{$school->school_name}}">
							<span class="glyphicon glyphicon-trash"></span> Delete
						</button></td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	<div id="previewModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="previewtitle"></h4>
        </div>
        <div class="modal-body">
          	<div id="school_intro" class="well" style="text-align:center;margin:5px 10px;">
          		<div class="row">
		<img id="previewimg" data-src="holder.js/100%x180" alt="100%x180" style="height: 400px; width: 100%; display: block;" src= data-holder-rendered="true">

	</div>
				
			
				<div class="row bold" >
				日期:
				<div id="previewdate">
					
				</div><br>
			</div>
			<div class="row bold" >
				上課人數:
				<div id="previewpeople">
					
				</div><br>
			</div>

			<div class="row bold" >
				課程簡介:
				<div id="previewintro">
					
				</div><br>
			</div>
			<div class="row bold" >
				上課地址:
				<div id="previewaddress">
					
				</div><br>

			</div>
			<div class="row bold" >
				費用:
				<div id="previewmoney">
					
				</div><br>
			</div>
			<div class="row bold" >
				自備材料:
				<div id="previewingredient">
					
				</div><br>
			</div>
			<div class="row bold" >
				積分可扣抵:
				<div id="previewdiscount">
					
				</div><br>
			</div>
			<div class="row bold" >
				注意事項:
				<div id="previewwarnning">
					
				</div><br>
			</div>
			<div class="row bold" >
				報名截止日:
				<div id="previewstopdate">
					
				</div><br>
			</div>
		</div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
								<input type="name" class="form-control" id="n" disabled>
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
		<script>
	$(document).on('click', '.preview-modal', function() {
		$('#previewtitle').text($(this).data('name'));
		$('#previewdate').text($(this).data('date'));
		$('#previewpeople').text($(this).data('people'));
		$('#previewintro').text($(this).data('intro'));
		$('#previewaddress').text($(this).data('address'));
		$('#previewmoney').text($(this).data('money'));
		$('#previewingredient').text($(this).data('ingredient'));
		$('#previewdiscount').text($(this).data('discount'));
		$('#previewwarnning').text($(this).data('warnning'));
		$('#previewstopdate').text($(this).data('stopdate'));

		var img_url= '../schoolpic-upload/' + $(this).data('img');
		$("#previewimg").attr("src",img_url);
	});

    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" 確定同意?");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.did').text($(this).data('id'));
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
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
            url: 'cmsSchoolagree',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });

    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: 'cmsSchooldeletedeny',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
</script>
</div>

@endsection