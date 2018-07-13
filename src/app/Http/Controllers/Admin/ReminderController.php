<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminReminder;
use App\Http\Requests\ResetPw;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReminderController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/reminder/index');
    }

    public function handle(AdminReminder $request)
    {
        $response = $this->api_request(
            'POST',
            'reminder',
            [
                'email' => $request->email
            ]);

        if (!$response || $response->code !== 200) {
            //ログイン失敗
            return redirect()->route('admin-reminder')->with('error', trans('messages.reminder_error'));
        }

        return view('admin/reminder/confirm');
    }

    public function resetpw($email_key)
    {
        $result = $this->checkEmailKey($email_key);
        if ($result) {
            return $result;
        }
        return view('admin/reminder/resetpw', ['email_key' => $email_key]);
    }

    /**
     * Check Valid email_key
     * @param  string $email_key
     * @return mixed
     */
    private function checkEmailKey($email_key)
    {
        if (empty($email_key)) {
            return redirect()->route('admin-reminder')->with('error', trans('messages.token_invailed'));
        }

        $response = $this->api_request(
            'GET',
            'reminder/' . $email_key
        );

        if (!$response || $response->code !== 200) {
            //ログイン失敗
            return redirect()->route('admin-reminder')->with('error', trans('messages.reminder_error'));
        }
        $items = $response->items;

        if (!$items->user_check) {
            return redirect()->route('admin-reminder')->with('error', trans('messages.reminder_error'));
        }

        return null;
    }

    public function doResetpw(ResetPassword $request)
    {
        $email_key = $request->email_key;
        $result = $this->checkEmailKey($email_key);
        if ($result) {
            return $result;
        }
        $response = $this->api_request(
            'POST',
            'reminder/' . $email_key,
            [
                'login_pw' => $request->new_password,
            ]);

        if (!$response || $response->code !== 200) {
            //ログイン失敗
            return view('admin/reminder/index', ['error' => trans("messages.reminder_error")]);
        }

        // Success 
        return redirect()->route('admin-reset-success')->with('success', true);
    }

    public function resetSuccess()
    {
        if (Session::get('success')) {
            return view('admin/reminder/reset_success');
        } else {
            return redirect()->route('admin-login');
        }

    }
}
