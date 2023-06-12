@extends('layouts.app')ù

@section('content')
<div class="d-flex flex-wrap align items-center justify-content-between my-0 mx-auto">
	@foreach ($posts as $post)
		<div class="card d-flex flex-column justify-content-between w-25 m-3 text-center">
			<div class="card-title">
				{{$post->title}}
			</div>
			<div class="card-body">
				<img class="w-100" src="{{$post->image}}" alt="">
			</div>
			<div class="p-1">
				<button class="btn btn-danger">
					<a class="text-dark" href="{{route('admin.posts.show', $post->id)}}">show more</a>
				</button>
			</div>
		</div>
	@endforeach
</div>
@endsection