<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    public function index(Request $request)
    {

        if(empty($request->page) || $request->page < 1 ){
            $page = 1;
        }else{
            $page = $request->page;
        }

        $response = $this->api_request(
            'GET',
            'news',
            [
                'page' => $page
            ]
        );
        
        if(!$response || $response->code !==200) {
            return redirect()->route('404')->with('error', trans('message.404'));
        }

        if($page > $response->last_page ){
            return redirect()->back();
        }

        $highlights_id = 0;
        if($page == 1 && count($response->items)>0){
            $highlights_id =  $response->items[0]->id;
        }
        $config_page = [
            'total_page' =>$response->last_page,
            'current_page'=>$response->current_page,
            'show_page' => config('constants.SHOW_PAGE'),
            'url'  => route('admin-info-index'),
            'other_class' =>"pagination-split justify-content-center",
            'parameters' => [],
        ];
        $config_page = (object)$config_page;
        $data = [
          'items' => $response->items,
          'title' => 'お知らせ',
          'ttlCol' => 'お知らせ',
          'highlights_id' => $highlights_id,
          'config_page' =>$config_page,
        ];
        return view('admin/information/index', $data);
    }
}
