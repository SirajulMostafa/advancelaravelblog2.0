@extends('layouts.main')

@section('title', '| All Posts')
@section('stylesheets')
@section('content')
  <br>
	<div class="row">

		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn  btn-info">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead class="thead-light">
					<th scope="col">#</th>
					<th scope="col">Title</th>
					<th scope="col">Body</th>
					<th scope="col">Created At</th>
					<th scope="col">Action</th>
				</thead>

				<tbody>

					@foreach ($posts as $post)

						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
							<td>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-sm">
                  <i class="fa fa-eye " aria-hidden="true"></i>
                </a>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">
                  <i class="fa fa-pencil-square-o " aria-hidden="true"></i>
                </a>
              </td>
						</tr>

					@endforeach

				</tbody>
			</table>
			{{-- <div class="text-md-12 text-md-center"> --}}
				{{-- {!! $posts->links(); !!} --}}
				{{-- {!! $posts->render(); !!} --}}
      {!!$posts->render('vendor.pagination.bootstrap-4')!!}
			{{-- </div> --}}
		</div>
	</div>

@endsection
