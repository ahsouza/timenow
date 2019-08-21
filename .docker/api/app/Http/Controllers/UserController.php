<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller {

	// ****************************************
	// ******** AUTENTICAÇÃO DE USUÁRIO *******
	// ****************************************

	public function login(Request $request) {
      
      $data = $request->all();

	  $validacao = Validator::make($data, [
	    'email' => 'required|string|email|max:255',
	    'password' => 'required|string',
	  ]);

	  if($validacao->fails()){
	    return ['status' => false, "validacao" => true, "erros" => $validacao->errors()];
	  }

	  if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
	    $user = auth()->user();
	    $user->token = $user->createToken($user->email)->accessToken;
	    // $user->avatar = asset($user->avatar);

	    return ['status' => true, "user" => $user];

	  } else {
	    return ['status'=> false];
	  }
	}

	// ****************************************
	// ********* CADASTRO DE USUÁRIO **********
	// ****************************************

	public function register(Request $request) {
    
      $data = $request->all();

	  $validacao = Validator::make($data, [
	    'name' => 'required|string|max:255',
	    'email' => 'required|string|email|max:255|unique:users',
	    'password' => 'required|string|min:6|confirmed',
	  ]);

	  if($validacao->fails()){
	    return ['status' => false, "validacao" => true, "erros" => $validacao->errors()];
	  }

	  $avatar = "/avatars/default.svg";

	  $user = User::create([
	    'name' => $data['name'],
	    'email' => $data['email'],
	    'password' => bcrypt($data['password']),
	    'avatar' => $avatar
	  ]);
	  $user->token = $user->createToken($user->email)->accessToken;
	  // $user->avatar = asset($user->avatar);

	  return ['status' => true, "user" => $user];
	}

	// ****************************************
	// ******** ATUALIZAÇÃO DE PERFIL *********
	// ****************************************

	public function profile(Request $request) {
	  // Atribuindo $user ao usuário logado no Sistema  
	  $user = $request->user();
	  // Recebendo e atribuindo $data dados da requisição do cliente
	  $data = $request->all();

	  if(isset($data['password'])) {

	    $validacao = Validator::make($data, [
	      'name' => 'required|string|max:255',
	      'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)],
	      'password' => 'required|string|min:6|confirmed',
	    ]);

	    if($validacao->fails()){
	      return ['status' => false, "validacao" => true, "erros" => $validacao->errors()];
	    }
	    
	    $user->password = bcrypt($data['password']);

	  } else {
	    
	    $validacao = Validator::make($data, [
	      'name' => 'required|string|max:255',
	      'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)],
	    ]);

	    if($validacao->fails()){
	      return ['status' => false, "validacao" => true, "erros" => $validacao->errors()];
	    }
	    $user->name = $data['name'];
	    $user->email = $data['email'];
	  }

	  if (isset($data['avatar'])) {

	    Validator::extend('base64image', function ($attribute, $value, $parameters, $validator) {
	      $explode = explode(',', $value);
	      $allow = ['png', 'jpg', 'svg','jpeg'];
	      $format = str_replace(
	        [
	          'data:image/',
	          ';',
	          'base64',
	        ],
	        [
	          '', '', '',
	        ],
	      
	        $explode[0]
	      );
	      
	      // check file format
	      if (!in_array($format, $allow)) {
	        return false;
	      }
	      // check base64 format
	      if (!preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $explode[1])) {
	        return false;
	      }
	    
	      return true;
	    });

	    $validacao = Validator::make($data, [
	      'avatar' => 'base64image',

	    ],['base64image'=>'Imagem inválida']);

	    if($validacao->fails()) {
	      return ['status' => false, "validacao" => true, "erros" => $validacao->errors()];
	    }

	    $time = time();

	    $pathHost = 'avatars';
	    $pathAvatar = $pathHost.DIRECTORY_SEPARATOR.'profile_id'.$user->id;
	    $ext = substr($data['avatar'], 11, strpos($data['avatar'], ';') - 11);
	    $url = $pathAvatar.DIRECTORY_SEPARATOR.$time.'.'.$ext;

	    $file = str_replace('data:image/'.$ext.';base64,','',$data['avatar']);
	    $file = base64_decode($file);

	    if (!file_exists($pathHost)) {
	      mkdir($pathHost,0700);
	    }

	    if($user->avatar) {
	    	$avatarUser = str_replace(asset('/'), '', $user->avatar);
	      
	      if(file_exists($avatarUser)) {
	        unlink($avatarUser);
	      }
	    }

	    if (!file_exists($pathAvatar)) {
	      mkdir($pathAvatar,0700);
	    }

	    file_put_contents($url, $file);
	    $user->avatar = $url;
	  } 

	  $user->save();

	  // $user->avatar = asset($user->avatar);
	  $user->token = $user->createToken($user->email)->accessToken;

	  return ['status' => true, "user" => $user];
	}

	// ****************************************
	// ********** PRÓXIMO CONTROLLER **********
	// ****************************************
}