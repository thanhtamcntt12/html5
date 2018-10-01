<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
  public function getProduct () {
    $data = Product::select('id','name')->get()->toArray();
    return view('product',['product_data' => $data]);
  }
}
