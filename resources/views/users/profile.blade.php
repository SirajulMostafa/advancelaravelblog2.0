@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if (session('status-error'))
                        <div class="alert alert-danger">
                            {{ session('status-error') }}
                        </div>
                        @endif
                    You are logged in! {!! Auth::user()->name!!}
                </div>
                <ul class="nav">
                    {{--@foreach($user as $user)--}}
                        <li>{{$user->name}}</li>
                        <li>{{$user->email}}</li>
                        <li>{{$user->created_at}}</li>
                        <li>{{$user->updated_at}}</li>
                    {{--@endforeach--}}

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
