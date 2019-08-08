<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validator\Rule;

class UserController extends Controller {

	public function login(Request $request) {
      
      $data = $request->all();

	  $validacao = Validator::make($data, [
	    'email' => 'required|string|email|max:255',
	    'password' => 'required|string',
	  ]);

	  if($validacao->fails()){
	    return $validacao->errors();
	  }

	  if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
	    $user = auth()->user();
	    $user->token = $user->createToken($user->email)->accessToken;
	    $user->avatar = asset($user->avatar);

	    return $user;
	  } else {
	    return ['status'=> false];
	  }
	}

	public function register(Request $request) {
    
      $data = $request->all();

	  $validacao = Validator::make($data, [
	    'name' => 'required|string|max:255',
	    'email' => 'required|string|email|max:255|unique:users',
	    'password' => 'required|string|min:6|confirmed',
	  ]);

	  if($validacao->fails()){
	    return $validacao->errors();
	  }

	  $avatar = "/avatars/default.jpg";

	  $user = User::create([
	    'name' => $data['name'],
	    'email' => $data['email'],
	    'password' => Hash::make($data['password']),
	    'avatar' => $avatar
	  ]);
	  $user->token = $user->createToken($user->email)->accessToken;
	  $user->avatar = asset($user->avatar);

	  return $user;
	}

	public function user(Request $request) {
	  return $request->user();
	}

	public function profile(Request $request) {
	  // Atribuindo $user ao usuário logado no Sistema  
	  $user = $request->user();
	  // Recebendo e atribuindo $data dados da requisição do cliente
	  $data = $request->all();

	  if(isset($data['password'])) {

	    $validacao = Validator::make($data, [
	      'name' => 'required|string|max:255',
	      'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
	      'password' => 'required|string|min:6|confirmed'
	    ]);

	    if($validacao->fails()){
	      return $validacao->errors();
	    }
	    
	    $user->password = Hash::make($data['password']);

	  } else {
	    
	    $validacao = Validator::make($data, [
	      'name' => 'required|string|max:255',
	      'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
	    ]);

	    if($validacao->fails()){
	      return $validacao->errors();
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

	    ],['base64image'=>'Imagem para avatar inválida']);

	    if($validacao->fails()) {
	      return $validacao->errors();
	    }

	    $time = time();

	    $pathHost = 'avatars';
	    $pathAvatar = $pathHost.DIRECTORY_SEPARATOR.'profile_id'.$user->id;
	    $ext = substr($data['avatar'], 11, strpos($data['avatar'], ';') - 11);
	    $url = $pathAvatar.DIRECTORY_SEPARATOR.$time.'.'.$ext;

	    $file = str_replace('data:image/'.$ext.';base64,','',$data['avatar']);
	    $file = base64_decode($file);

	    if (!file_exists($pathHost)) {
	      mkdir($pathHost, 0700);
	    }

	    if($user->avatar) {
	      
	      if(!file_exists($user->avatar)) {
	        unlink($user->avatar);
	      }
	    }

	    if (!file_exists($pathAvatar)) {
	      mkdir($pathAvatar, 0700);
	    }

	    file_put_contents($url, $file);

	    $user->avatar = $url;
	  } 

	  $user->save();

	  $user->avatar = asset($user->avatar);
	  $user->token = $user->createToken($user->email)->accessToken;

	  return $user;
	}
}