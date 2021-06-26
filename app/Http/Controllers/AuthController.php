<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

  public function register(StoreUserRequest $requst)
  {

    $user = User::create($requst->validated());
    $token = $user->createToken('myapitoken')->plainTextToken;

    return [
      "user" => $user,
      "token" => $token
    ];
  }
  public function login()
  {
    return 'login';
  }
  public function logout()
  {
    return 'logout';
  }
}
