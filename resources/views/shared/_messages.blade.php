@foreach(['danger', 'warning', 'success', 'info'] as $msg)
	@if(session()->has($msg))
		<div class="glyphicon col-md-12">
			<p class="alert alert-{{ $msg }}">
				{{ session()->get($msg) }}
			</p>
		</div>
	@endif
@endforeach