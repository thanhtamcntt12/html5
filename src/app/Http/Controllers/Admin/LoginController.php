<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminLogin;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/login');
    }

    /**
     * Display the specified resource.
     * @param AdminLogin $request
     * @return \Illuminate\Http\Response
     */

    public function store(AdminLogin $request)
    {
        $response = $this->api_request(
            'POST',
            'user/login',
            [
                'login_id' => $request->login_id,
                'login_pw' => $request->login_pw,
                'customer_id' => 1,
                'user_type_id' => 2
            ]);

        if (!$response || $response->code !== 200) {
            //ログイン失敗
            return redirect()->route('admin-login')->with('error', trans('messages.login_error'));
        }
        //ログイン成功
        $this->login_user($response->items);

        return redirect()->route('admin-home');
    }
}
