<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        return view('admin.product.create');  
    }

    public function reviewManage(){
        return view('admin.product.manage_product_review');
    }
}
