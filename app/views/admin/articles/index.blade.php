@extends('_layout.default')

@section('main')
		
		<p>{{link_to_route('admin.articles.create','添加文章')}}
		<table>
			<tr>
				<th>编号</th>
				<th>title</th>
				<th>content</th>
				<th>最后更新时间</th>
				<th>操作</th>
			</tr>
			
				@Foreach($articles as $article)
				<tr>
					<td>{{$article->id}}</td>
					<td>{{$article->title}}</td>
					<td>{{$article->body}}</td>
					<td>{{$article->updated_at}}</td>
					<td>
					<a href='{{URL::Route("admin.articles.edit","$article->id")}}'>编辑</a>
					&nbsp;
					{{Form::open(array('route'=>array('admin.articles.destroy',$article->id),'method'=>'delete'))}}
						
					{{Form::submit('删除')}}
					{{Form::close()}}
					</td>
				</tr>
				@endForeach
			
		</table>
@stop