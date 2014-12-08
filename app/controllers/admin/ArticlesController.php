<?php

namespace App\Controllers\Admin;

use Article;
use Validator,Input,Redirect;
class ArticlesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin/articles
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('admin.articles.index')->with('articles',Article::all());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/articles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('admin.articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/articles
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('title'=>'required|min:5');
		$validator = Validator::make(Input::all(),$rules);
		if ($validator->fails())
        		{
		            return Redirect::route('admin.articles.create')
		                ->withErrors($validator)
		                ->withInput();
       		 }

       		 $article = new Article;
       		 $article->title = Input::get('title');
       		 $article->body = Input::get('body');
       		 $article->save();

       		 return Redirect::route('admin.articles.index');
	}

	/**
	 * Display the specified resource.
	 * GET /admin/articles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/articles/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::find($id);
		//dd($article);
		//return Redirect::Route('admin.articles.index');
		return \View::make('admin.articles.edit')->with('article',$article);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/articles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array('title'=>'required|min:5');
		$validator = Validator::make(Input::all(),$rules);
		if ($validator->fails())
        		{
		            return Redirect::route('admin.articles.create')
		                ->withErrors($validator)
		                ->withInput();
       		 }

       		$article = Article::find($id);

		$article->title = Input::get('title');
		$article->body = Input::get('body');
		$article->save();

        		return Redirect::route('admin.articles.index', array($article->id));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/articles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Article::destroy($id);
		return Redirect::route('admin.articles.index');
	}

}