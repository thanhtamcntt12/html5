<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CateController extends Controller
{
  public function getCateAdd(){
    return view('admin.category.cate_add');
  }

}
