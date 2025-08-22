<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDiscountController extends Controller
{
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.discount.create');
    }

     /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        return view('admin.discount.manage');
    }
}
