@extends('_layout.default')
@section('main')

	@if ($errors->any())
		<div id="error_explanation">
		    <h2>{{ count($errors->all()) }} prohibited
		      this article from being saved:</h2>
		    <ul>
		    @foreach ($errors->all() as $message)
		      <li>{{ $message }}</li>
		    @endforeach
		    </ul>
		</div>
	@endif

	{{Form::open(array('route'=>'admin.articles.store'))}}

	{{Form::label('title','Title')}}

	{{Form::text('title')}}

	{{Form::label('body','Content')}}

	{{Form::textarea('body')}}

	{{Form::submit('提交')}}
	<a href='{{URL::Route("admin.articles.index")}}'>取消</a>

	{{Form::close()}}
@stop