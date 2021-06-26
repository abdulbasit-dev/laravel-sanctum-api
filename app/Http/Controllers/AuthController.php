<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{

  public function register(StoreUserRequest $requst)
  {

    return "user created";
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
