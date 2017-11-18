@extends('layouts.main')
@section('title',' | Edit Post')
@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.css') !!}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'link code image',
    menubar: false,
  });
</script>
@endsection
@section('content')

	<div class="row">
    <div class="col-md-8">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT','files' => true]) !!}
  <div class="form-group">
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

	</div>
	<div class="form-group">
			{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('slug', null, ['class' => 'form-control']) }}
 </div>
  <div class="form-group">
			{{ Form::label('category_id', "Category:", ['class' => 'form-spacing-top']) }}
			{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>
  <div class="form-group">
			{{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'id'=>'tags', 'multiple'=>'multiple']) }}

	</div>
  <div class="form-group">
			{{ Form::label('featured_image', 'Update Image') }}
			{{ Form::file('featured_image') }}

	</div>


	<div class="form-group">
			{{ Form::label('body', "Body:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}

</div>


	</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}

          </div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-info btn-block']) }}
					</div>
				</div>

			</div>
		</div>
		{!! Form::close() !!}
	</div>	<!-- end of .row (form) -->

@endsection

@section('scripts')
  {!! Html::script('js/parsley.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
		 $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
		// $(".select2-multi").select2({maximumSelectionLength: 6});
	</script>

@endsection
