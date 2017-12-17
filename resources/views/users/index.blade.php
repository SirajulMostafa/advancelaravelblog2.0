@extends('layouts.main')
@section('title', '| All Posts')
@section('stylesheets')
@section('content')
  <br>
	<div class="row">

		<div class="col-md-10">
			<h1>All Users</h1>
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
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Created At</th>
					<th scope="col">Updated At</th>
					<th scope="col">Action</th>
				</thead>
				<tbody>
                @php $i=0; @endphp
                @foreach($users as $user)
                    @php $i++; @endphp
                    <tr>
                        <td>{{$i}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
                        <td>{{ date('M j, Y', strtotime($user->created_at)) }}</td>
                        <td>{{ date('M j, Y', strtotime($user->updated_at)) }}</td>
						<td>
                            @if(Auth::id()==$user->id)
                              <?php  $value="";?>
                        @else
                           <?php $value="disabled" ?>
                            @endif
                            <a href="{{ url('users/profile', $user->id) }}" class="btn btn-outline-info btn-sm ">
                                <i class="fa fa-eye " aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning btn-sm {{$value}}">
                                <i class="fa fa-pencil-square-o  " aria-hidden="true"></i>
                            </a><a href="" class="btn btn-outline-danger btn-sm {{$value}}">
                                <i class="fa fa-trash-o " aria-hidden="true"></i>
                            </a>


                        </td>
					</tr>
				@endforeach
				</tbody>
			</table>
      {!!$users->render('vendor.pagination.bootstrap-4')!!}
		</div>
	</div>
@endsection
