@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<div class="notification is-danger">
			{{$error}}
		</div>
	@endforeach
@endif

@if(session("success"))
	<div class="notification is-success">
		{{session("success")}}
	</div>
@endif

@if(session("error"))
	<div class="notification is-danger">
		{{session("error")}}
	</div>
@endif