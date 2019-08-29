<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\content;
use App\User;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller {

	// ****************************************
	// ********* LISTANDO CONTEÚDOS ***********
	// ****************************************
	
	public function listContent(Request $request) {

		$contents = Content::with('user')->orderBy('date', 'DESC')->paginate(5);
		$user = $request->user();

		foreach ($contents as $key => $content) {
		  $content->total_likes = $content->likes()->count();
		  $content->total_comments = $content->comments()->with('user')->get();
		  $like = $user->likes()->find($content->id);

		  if ($like) {
		    $content->like_content = true;
		  } else {
		    $content->like_content = false;
		  }
		}

		return ['status' => true, 'contents' => $contents];
	}

	// ****************************************
	// ***** LISTANDO CONTEÚDOS DO USUÁRIO ****
	// ****************************************

	public function pageUser($id, Request $request) {

		$userPage = User::find($id);

		if($userPage) {
			$contents = $userPage->contents()->with('user')->orderBy('date', 'DESC')->paginate(5);
			$user = $request->user();

			foreach ($contents as $key => $content) {
			  $content->total_likes = $content->likes()->count();
			  $content->total_comments = $content->comments()->with('user')->get();
			  $like = $user->likes()->find($content->id);

			  if ($like) {
			    $content->like_content = true;
			  } else {
			    $content->like_content = false;
			  }
			}

			return ['status' => true, 'contents' => $contents, 'adminPage' => $userPage];
		} else {

			return ['status' => false, 'errp' => 'Usuário não existe'];
		}

	}

    // ****************************************
	// ******** ADICIONAR CONTEÚDOS ***********
	// ****************************************

	public function addContent(Request $request) {
		$data = $request->all();
		$user = $request->user();

		
		// Validação
		$validacao = Validator::make($data, [
		    'title' => 'required',
		    'text' => 'required',
		]);

		if ($validacao->fails()) {

			return [
			  'status' => false, 
			  "validacao" => true, 
			  "erros" => $validacao->errors()
			];
		}

		$content = new content;

		$content->title = $data['title'];
		$content->text = $data['text'];
		$content->link = $data['link'] ? $data['link'] : '#';
		$content->image = $data['image'] ? $data['image'] : '#';
		$content->date = date('Y-m-d H:i:s');

		$user->contents()->save($content);

		$contents = Content::with('user')->orderBy('date', 'DESC')->paginate(5);

		return [
		  'status' => true, 
		  'contents' => $contents
		];

	}

	// ****************************************
	// ******** CURTINDO CONTEÚDOS ***********
	// ****************************************

	public function likedContent($id, Request $request) {

		$content = Content::find($id);

		if($content) {
		  $user = $request->user();
		  $user->likes()->toggle($content->id);

		  return [
		  	'status'=> true, 
		  	'likes' => $content->likes()->count(), 
		  	'list' => $this->listContent($request)
		  ];

		} else {
		  return ['status' => false, "erro" => "Conteúdo não existe!"];
		}
	}

	// ****************************************
	// ******** COMMENTANDO CONTEÚDOS *********
	// ****************************************

	public function commentContent($id, Request $request) {
		$data = $request->all();
		$content = Content::find($id);

		// Validação
		$validacao = Validator::make($data, [
		   'text' => 'required',
		]);

		if ($validacao->fails()) {

			return [
			  'status' => false, 
			  "validacao" => true, 
			  "erros" => $validacao->errors()
			];
		}
		//


		if ($content) {
		  $user = $request->user();
		  $user->comments()->create([
		  	'content_id' => $content->id,
		  	'text' => $request->text,
		  	'date' => date('Y-m-d H:i:s')
		  ]);

		  return [
		  	'status' => true,
		  	'list' => $this->listContent($request)
		  ];

		} else {
			return ['status' => false, 'erro' => 'Conteúdo não existe!'];
		}
	}

}