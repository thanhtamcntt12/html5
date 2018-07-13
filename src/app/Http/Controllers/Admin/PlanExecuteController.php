<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlanExecuteSearch;

class PlanExecuteController extends Controller
{

    public $value_tmp = [
       'name' => '胸の日', 'value' => [
            ['id' => 1, 'create_date' => '2017/03/07', 'implementation_type' => 'Personal', 'author' => 'スタッフA', 'create_at' =>'2017/03/07/12:00'],
            ['id' => 1, 'create_date' => '2017/03/01', 'implementation_type' => 'Self', 'author' => 'スタッフA', 'create_at' =>'2017/03/01/12:00'],
            ['id' => 1, 'create_date' => '2017/02/01', 'implementation_type' => 'Personal', 'author' => 'スタッフA', 'create_at' =>'2017/02/01/12:00'],
        ],
        'name_1' => '肩の日', 'value_1' => [
            ['id' => 2, 'create_date' => '2017/03/07', 'implementation_type' => 'Personal', 'author' => 'スタッフA', 'create_at' =>'2017/03/07/12:00'],
            ['id' => 2, 'create_date' => '2017/03/01', 'implementation_type' => 'Self', 'author' => 'スタッフA', 'create_at' =>'2017/03/01/12:00'],
        ],
        'name_2' => '背中の日', 'value_2' => [
            ['id' => 3, 'create_date' => '2017/03/07', 'implementation_type' => 'Personal', 'author' => 'スタッフA', 'create_at' =>'2017/03/07/12:00'],
        ],
        'name_3' => '背中', 'value_3' => [
            ['id' => 4],
        ],  
    ];

    public $value_tmp_noreg = [
        ['id' => 1, 'name' => '胸の日',  'author' => 'スタッフA', 'create_at' =>'2017/03/07/12:00'],
    ];

    public function index(Request $request,$user_id)
    {
        // dd($user_id);

        if(empty($user_id)) {
            return redirect()-route('404')->with('error', trans('messages.404'));
        }

        if(empty($request->page) || $request->page < 1 ){
            $page = 1;
        }else{
            $page = $request->page;
        }


        $response = $this->api_request(
            'GET',
            'plan_execute/'.$user_id,
            [
                'page' => $page
            ]
        );
        
        if(!$response || $response->code !== 200) {
            return redirect()-route('404')->with('error', trans('messages.404'));
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
            'url'  => route('admin-plan-execute-index', ['user_id'=>$user_id]),
            'other_class' =>"pagination-split justify-content-center",
            'parameters' => [],
        ];
        $config_page = (object)$config_page;


        // $response = [
        //     'items' => $this->value_tmp
        // ];
        // $response = (object) $response;
        // dd($response);
        
        if(!empty($response->items) && count($response->items) > 0) {
            $data = [
                // 'items' => $response->items,
                // 'items_noreg' => $this->value_tmp_noreg,
                'action_from' =>route('admin-plan-execute-search',$user_id),
                'list_plan_execute' => $response->items,
                'highlights_id' => $highlights_id,
                'config_page' =>$config_page,
                'user_id' => $user_id
            ];
            // dd($data);
            return view('admin/plan_execute/index', $data);
        } else {
            return view('admin/plan_execute/nulllist');
        }
    }

    public function search(PlanExecuteSearch $request, $user_id)
    {
        $data = [
            // 'items' => $this->value_tmp,
            // 'items_noreg' => $this->value_tmp_noreg,
            // 'action_from' =>route('admin-plan-execute-search',$user_id),
            'user_id' => $user_id
        ];
        return view('admin/plan_execute/index', $data);
    }

    public function delete($user_id, $plan_execute_id)
    {
        // dd($plan_execute_id);
        if(empty($user_id) || empty($plan_execute_id)) {
            return redirect()-route('404')->with('error', trans('messages.404'));
        }
        //dd($plan_execute_id);

        $response = $this->api_request(
            'DELETE',
            'plan_execute/'.$user_id.'/'.$plan_execute_id
        );
        
        if(!$response || $response->code !== 200){
            return redirect()-route('404')->with('error', trans('messages.404'));
        }

        return redirect()->back();
    }

    public function create($user_id)
    {
        $data = [
            'user_id' => $user_id
        ];
        return view('admin/plan_execute/index', $data);
    }

    public function doCreate(PlanExecuteSearch $request, $user_id)
    {
        if(empty($user_id)) {
            return redirect()-route('404')->with('error', trans('messages.404'));
        }
        // $response = $this->api_request(
        //     'POST',
        //     'plan_exercise'. $user_id,
        //     [
        //         'user_id' => $user_id
        //     ]
        // );
        return view('admin/plan_execute/index');
    }

    public function copy(PlanExecuteSearch $request, $user_id)
    {
        // dd($user_id);
        //dd($request->all());
        if(empty($user_id)) {
            return redirect()-route('404')->with('error', trans('messages.404'));
        }

        // $request = [
        //     'date' => date('Y-m-d'),
        //     'plan_execute_id' => 13685
        // ];
        // $request = (object) $request;
        $data = [
            'user_id' => $user_id
        ];
        //dd($request->plan_execute_id);
        $plan_execute_id = $this->api_request(
            'GET',
            'plan_execute/'.$user_id.'/'.$request->id
        );
        dd($plan_execute_id);
        if(!$plan_execute_id || $plan_execute_id->code !==200){
            return redirect()->route('404')->with('error', trans('message.404'));
        }

        return redirect()->route('admin-plan-execute-index', ['user_id'=> $user_id]);

    }
}
