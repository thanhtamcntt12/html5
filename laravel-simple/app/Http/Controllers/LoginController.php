<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
  // lấy giao diện login ra
  public function getLogin(){
    if(!Auth::check()){
      return view('admin.module.login.login');
    } else{
      return redirect('qho_admin');
    }
  }

  public function postLogin(LoginRequest $request){

    $login = [
      'username' => $request->txtUser,
      'password' => $request->txtPass,
      'level' => 1
    ];
    if (Auth::attempt($login)) {
    // Authentication passed...
    return redirect('qho_admin');
    } else {
      return redirect()->back();
    }
  }

  public function getLogout(){
    Auth::logout();
    return redirect()->route('getLogin');
  }
}
