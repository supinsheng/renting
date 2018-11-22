<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('Weixin.order');
    }
}
