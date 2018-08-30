<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarrantyController extends Controller
{
    public  function  index(){
        return view('Weixin.warranty_claim');
    }
}
