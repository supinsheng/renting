<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\weixin\FwbgRequest;

class FwbgController extends Controller
{
    public  function  index(){
        return view("Weixin.fwbg");
    }
    public  function  store(){

    }
}
