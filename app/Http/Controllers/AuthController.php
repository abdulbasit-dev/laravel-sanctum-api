<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

  public function register(StoreUserRequest $request)
  {

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);

    $token = $user->createToken('myapitoken')->plainTextToken;

    return [
      "user" => $user,
      "token" => $token
    ];
  }


  public function login(Request $request)
  {
    $fields = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required', 'string'],
    ]);

    //check email
    $user = User::where('email', $fields['email'])->get()->first();

    //check passwors
    if (!$user || !Hash::check($fields['password'], $user->password)) {
      return [
        'message' => "wronge credential"
      ];
    }


    $token = $user->createToken('myapitoken')->plainTextToken;

    return [
      "user" => $user,
      "token" => $token
    ];
  }


  public function logout()
  {
    auth()->user()->tokens()->delete();
    return [
      'message' => "logout"
    ];
  }
}
