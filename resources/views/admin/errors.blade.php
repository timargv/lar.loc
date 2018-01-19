@if ($errors->any())
<br />
<div class="box-body">
	<div class="col-xs-12">
	@foreach ($errors->all() as $error)
	<div class="alert alert-danger" role="alert">
		{{ $error }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endforeach
	</div>
</div>
@elseif ($errors->any() == null)
	<br />
@endif
