@extends('layouts.schoolapp')

@section('content')
<link href=dist/css/school/schoolindex.css rel=stylesheet>
<div id="class_list" class="container" style="width:50%">
	<h2 class="bold inform">information</h2>
@foreach ($schools as $school)
	<a  href="{{ URL::asset('school/').'/'.$school->id}}"><div style="margin-top:10px;background:#eeeeee;" class="row class_unit">
		<div class="col-md-3">
			<img data-src="holder.js/140x140" class="img-rounded img-responsive full-width" alt="140x140"  src="{{URL::asset('schoolpic-upload').'/'.$school->img_url}}" data-holder-rendered="true">
		</div>
		<div class="col-md-9">
			<div class="row classanduser">
				<div class="col-md-8 class_name">
					<h3 class="bold">{{$school->school_name}}</h3>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-4"><img data-src="holder.js/140x140" class="img-circle" alt="140x140" style="width: 40px; height: 40px;" src="{{URL::asset('user-upload').'/'.$school->user->user_img}}" data-holder-rendered="true"></div>
						<div class="col-md-8 classer_name" ><small>by {{$school->user->name}}</small></div>
					</div>
				</div>
			</div>
			<div class="row class_intro">
				{{$school->intro}}
			</div>
		</div>
	</div></a>
	@endforeach













</div>









@endsection