@extends('layouts.main')
@section('title', '| View Post')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="image">
                <img src="{{asset('images/'.$post->image)}}" alt="" class="  pull-left img-thumbnail">
            </div>
            <div class="table-responsive">
                <h1>{{ $post->title }}</h1>
                <p class="lead">{!! $post->body !!}</p>
                <hr>
                <div class="tags">
                    @forelse($post->tags as $tag)
                        <span class="badge badge-info">{{ $tag->name }}</span>
                    @empty
                        <span class="badge badge-info">No tag assign for this post.</span>
                    @endforelse
                </div>
                <div id="backend-comments" style="margin-top: 50px;">
                    Total Comment:
                    <small>{!! count( $post->comments) !!} </small>
                    @forelse($post->comments as $comment)
                        <h3> Total Comments:
                            <small>{{($comment)}}</small>
                        </h3>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>
                                    <a href="{{ route('comments.edit', $comment->id) }}"
                                       class="btn btn-sm btn-info"><span class="fa fa-pencil"></span></a>

                                    <a href="{{ route('comments.delete', $comment->id) }}"
                                       class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    @empty
                        <div class="alert alert-info">
                            <h3>
                                <small> No comment for this post!</small>
                            </h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p><a href="{{ route('blogs.single', $post->slug) }}">{{ route('blogs.single', $post->slug) }}</a>
                    </p>
                    <p><a href="{{url('blogs', $post->slug) }}">{{ url('blogs', $post->slug) }}</a></p>

                </dl>

                <dl class="dl-horizontal">
                    <style media="screen">
                        .dl-p {
                            /*padding-left: 5rem;*/
                            font-size: .9rem;
                            /*opacity: .7;*/
                            color: #17b4c7;
                        }
                    </style>
                    <span class="label label-default|primary|success|info|warning|danger"></span>
                    <label>Category:</label>
                    <p class="dl-p">{{ $post->category->name }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p class="dl-p">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p class="dl-p">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('posts.index', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
