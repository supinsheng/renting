<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FwbgController extends Controller
{
    public  function  index(){
        return view("Weixin.fwbg");
    }
    public  function  store(){

    }
}
