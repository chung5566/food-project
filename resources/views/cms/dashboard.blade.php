@extends('cms/layouts.app') 
@section('content')
<link rel="stylesheet"
  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
<div class="text-center">

    <a class="quick-btn" href="cms/cms_member">
  <i class="fa fa-bolt fa-2x"></i>
  <span>會員</span>
  <span class="label label-default">{{count($member)}}</span>
    </a>
    <a class="quick-btn" href="cms/cms_task">
  <i class="fa fa-check fa-2x"></i>
  <span>食譜</span>
  <span class="label label-danger">{{count($task)}}</span>
    </a>
    <a class="quick-btn" href="cms/cms_school_deny">
  <i class="fa fa-building-o fa-2x"></i>
  <span>開課申請</span>
  <span class="label label-danger">{{count($school1)}}<span>
    </a>
    <a class="quick-btn" href="cms/cms_school_agree">
  <i class="fa fa-envelope fa-2x"></i>
  <span>開課數量</span>
  <span class="label label-success">{{count($school2)}}</span>
    </a>
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
<div class="container "style="width:100%">
    <div class="form-group row add">
      <div class="row col-md-8">
        <input class="col-md-4" type="input" class="form-control" id="name" name="name"
          placeholder="Enter some name" required>
        <p class="error text-center alert alert-danger hidden"></p>
      
      <input class="col-md-8" type="text" class="form-control" id="content" name="content"
          placeholder="Enter some content" required>
        <p class="error text-center alert alert-danger hidden"></p>
      </div>
      <div class="col-md-4">
        <button class="btn btn-primary" type="submit" id="add">
          <span class="glyphicon glyphicon-plus"></span> ADD
        </button>
      </div>
    </div>
    {{ csrf_field() }}
    <div class="table-responsive text-center">
      <table class="table table-borderless" id="table">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Content</th>
          </tr>
        </thead>
        @foreach($announces as $announce)
        <tr class="item{{$announce->id}}">
          <td>{{$announce->id}}</td>
          <td>{{$announce->name}}</td>
          <td>{{$announce->content}}</td>

          <td><button class="edit-modal btn btn-info" data-id="{{$announce->id}}"
              data-name="{{$announce->name}}" data-content="{{$announce->content}}">
              <span class="glyphicon glyphicon-edit"></span> Edit
            </button>
            <button class="delete-modal btn btn-danger"
              data-id="{{$announce->id}}" data-name="{{$announce->name}}">
              <span class="glyphicon glyphicon-trash"></span> Delete
            </button></td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
<hr>
<div class="row">

  
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
            <div class="form-group">
              <label class="control-label col-sm-2" for="content">content:</label>
              <div class="col-sm-10">
                <input type="content" class="form-control" id="c">
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
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                    <script>
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
        $('#c').val($(this).data('content'));
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
            url: 'cms/editAnnounce',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val(),
                'content': $('#c').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.content + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'data-content='"+data.content+"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });
    $("#add").click(function() {
        $.ajax({
            type: 'post',
            url: 'cms/addAnnounce',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val(),
                'content':$('input[name=content]').val()
            },
            success: function(data) {
                if ((data.errors)){
                  $('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.content + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name +"'data-content ='"+ data.content+ "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' data-content='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },
        });
        $('#name').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: 'cms/deleteAnnounce',
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
                @endsection