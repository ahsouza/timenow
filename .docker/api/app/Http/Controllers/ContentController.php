<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\content;

class ContentController extends Controller {

	// ****************************************
	// ********* LISTANDO CONTEÚDOS ***********
	// ****************************************
	
	public function listContent(Request $request) {
		return content::with('user')->orderBy('data', 'DESC')->paginate(5);
	}


    // ****************************************
	// ******** ADICIONAR CONTEÚDOS ***********
	// ****************************************

	public function addContent(Request $request) {
		$data = $request->all();
		$user = $request->user();

		$content = new content;

		$content->title = $data['title'];
		$content->text = $data['text'];
		$content->link = $data['link'] ? $data['link'] : '#';
		$content->image = $data['image'] ? $data['image'] : '#';
		$content->date = date('Y-m-d H:i:s');

		$user->contents()->save($content);

		return ['status' => true, 'contents' => $user->contents];

	}



}