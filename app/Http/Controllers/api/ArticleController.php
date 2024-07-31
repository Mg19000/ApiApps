<?php

namespace App\Http\Controllers\api;
use App\Models\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	public function index (){
         return Article::select('title','body',          'description')->get();
   
}  

public function  store (Request  $request )
{
	$request->validate ([
	'title'=>'required ',
'body'=>   'required ',
   'description'=>'required '
	]);
	Article::create($request->post());
	return  response()->json([
	'message'=> 'new item added successfully '
	]);
	}
	
	public function  show(Article  $article )
	{
		return  response()->json([
		'article '  => $article 
		]);
		}
		
		public function update(Request  $request , Article  $article ){
			$request->validate ([
	'title'=>'required ',
'body'=>   'required ',
   'description'=>'required '
	]);
	$article->fill($request->post())->update();
	return  response()->json([
	'message'=>'the item update successfully '
	]);
}

public function destroy(Article $article )
{
	$article->delete();
	return response()->json([
	'message'=>'the item deleted successfully '
	]);
	}

}
