<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminLogin;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //お知らせ取得
        $response = $this->api_request(
            'GET',
            'news'
        );

        //表示用データ調整
        $data = [
            'news_lists' => $response->items
        ];
        return view('admin/home', $data);
    }

    /**
     * Test layout
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create_layout()
    {
        $data = [
            'user' => (array)getUserInfo($this, 1),
            'userId' => 1
        ];
        return view('admin/index', $data);
    }
}
