<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerMainController extends Controller
{
    public function index(){
        return view('seller.dashboard');
    }
    public function orderHistory(){
        return view('seller.order-history');
    }
}
