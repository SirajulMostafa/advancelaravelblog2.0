@extends('layouts.main')
@section('title',' |welcome')

@section('content')

  {{-- <div style="padding-top-10px" class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1 class="display-3">Wellcome  to my Laravel blog Site</h1>
        <p class="lead">
          This is a Blog site, this is my Laravel blog site make with laravel5.5.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
          <a class="btn btn-info  btn-lg" href="#" role="button">popular post</a>
        </p>
    </div>
    </div>
  </div> --}}
  <div class="row">
    <div class="col-md-8">
      @foreach ($posts as $post)
      <div class="post">
        <h3>{{$post->title}}-  {{$post->user_id}}</h3>
          <span class="fa fa-user-o"></span>
          {{$post->user_id}}
        <p class="details">
          {{-- {{$post->body}} --}}
          {{substr(strip_tags($post->body),0,300)}}{{strlen(strip_tags($post->body))>300?".....":""}}
        </p>
        <a class=" btn btn-info" href="{{url('blogs/'.$post->slug)}}" role="button">Read more</a>

      </div>
        <hr>
        @endforeach

    </div>
    <div class="col-md-3 col-md-offset-1">
      <h3>Sidebar</h3>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

    </div>
  </div>
  @endsection
