@extends('layouts.app');
@section('content')
	<div class="d-flex align-items-center justify-content-center">
		<div class="card d-flex flex-row align-items-center p-1 m-3 text-center">
			<div class="card-title w-25">
				{{ $post->title }}
			</div>
			<div class="card-body">
				<img class="w-100" src="{{ $post->image }}" alt="">
			</div>
			<div class="w-50">
				<p>
					{{ $post->body }}
				</p>
			</div>
		</div>
	</div>
@endsection
