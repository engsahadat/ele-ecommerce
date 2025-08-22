<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function index(){
        return view('admin.admin');
    }
    public function setting(){
        return view('admin.settings');
    }
    public function manageUser(){
        return view('admin.manage.user');
    }
    public function manageStore(){
        return view('admin.manage.store');
    }
    public function cartHistory(){
        return view('admin.cart.history');
    }
    public function orderHistory(){
        return view('admin.order.history');
    }
}
