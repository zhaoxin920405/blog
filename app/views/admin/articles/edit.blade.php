@extends('_layout.default')
@section('main')

	{{Form::open(array('route' => array('admin.articles.update', $article->id), 'method' => 'put')) }}

	{{Form::label('title','Title')}}

	{{Form::text('title',$article->title)}}

	{{Form::label('body','Content')}}

	{{Form::textarea('body',$article->body)}}

	{{Form::submit('提交')}}
	<a href='{{URL::Route("admin.articles.index")}}'>取消</a>

	{{Form::close()}}
	you are SB
@stop