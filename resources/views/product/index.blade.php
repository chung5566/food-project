@extends('layouts.productapp') 
@section('content')

<div class='container'>
	<div class='col-md-2'>
		<div class='row'>
			<button type="button " class="btn btn-primary btn-lg"> 所 有 商 品 </button>
		</div>
		<div class='row' style='margin-top:5px'>
			<button type="button" class="btn btn-primary btn-lg"> 達 人 手 做 </button>
		</div>
		<div class='row' style='margin-top:5px'>
			<button type="button" class="btn btn-primary btn-lg"> 本 站 獨 家 </button>
		</div>
		<div class='row' style='margin-top:5px'>
			<button type="button" class="btn btn-primary btn-lg"> 商 家 商 品 </button>
		</div>
		<div class='row' style='margin-top:5px'>
			<button type="button" class="btn btn-primary btn-lg"> 好 物 評 鑑 </button>
		</div>
	</div>
	<div class='col-md-9 col-md-offset-1 '>
		<div class='row'>
			<a href="product/create" class="btn btn-primary btn-lg" style='float:right'> 申 請 商 品 </a>
		</div>
		<div class = 'row' style ="background='yellow';margin-top:10px">
			<form class="form-inline">
			  <div class="form-group">
			    <input type="text" class="form-control" id="exampleInputName2" placeholder="輸入關鍵字">
			  </div>
			  
			  <button type="submit" class="btn btn-default">依名稱搜尋</button>
			  <button type="submit" class="btn btn-default">重新搜尋</button>
			</form>
		</div>
		<div class='row' style='margin-top:20px'>
			@foreach ($products as $product)
			<div class='col-md-4'>
				<a href="product/{{ $product-> id }}" class="thumbnail" style = "margin-top:10px"> 
					<img data-src="holder.js/100%x180" alt="100%x180" style="height: 220px; width: 100%; display: block;" src="{{URL::asset('productpic-upload').'/'.$product->img_url}}" data-holder-rendered="true">
				{{ $product->name }}
				</a>
			</div>
			@endforeach

		</div>
	</div>
</div>



























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