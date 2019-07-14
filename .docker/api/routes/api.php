<?php

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', function(Request $request) {
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
  } else {
  	return ['status'=>'Não foi possível autenticar usuário'];
  }

  // $user = User::create([
  //        'name' => $data['name'],
  //        'email' => $data['email'],
  //        'password' => Hash::make($data['password']),
  // ]);


  return $user;

})

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
