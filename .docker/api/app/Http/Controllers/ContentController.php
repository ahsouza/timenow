<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\content;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller {

	// ****************************************
	// ********* LISTANDO CONTEÚDOS ***********
	// ****************************************
	
	public function listContent(Request $request) {

		$contents = Content::with('user')->orderBy('data', 'DESC')->paginate(5);
		$user->$request->user();

		foreach ($contents as $key => $content) {
			$content->totalLikes = $content->likes()->count();
		}

		return ['status' => true, 'contents' => $contents];
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
			return ['status' => false, "validacao" => true, "erros" => $validacao->errors()];
		}


		$content = new content;

		$content->title = $data['title'];
		$content->text = $data['text'];
		$content->link = $data['link'] ? $data['link'] : '#';
		$content->image = $data['image'] ? $data['image'] : '#';
		$content->date = date('Y-m-d H:i:s');

		$user->contents()->save($content);

		$contents = Content::with('user')->orderBy('data', 'DESC')->paginate(5);

		return ['status' => true, 'contents' => $contents];

	}

	// ****************************************
	// ******** CURTINDO CONTEÚDOS ***********
	// ****************************************

	public function likedContent($id, Request $request) {

		$content = Content::find($id);

		if($content) {
		  $user = $request->user();
		  $user->likes()->toggle($content->id);

		  return ['status'=> true, 'likes' => $content->likes()->count()];
		} else {
			return ['status' => false, "erro" => "Conteúdo não existe!"]
		}
	}

}