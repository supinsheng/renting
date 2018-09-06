<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class XuzuController extends Controller
{
    public  function  index(){
        return  view("Weixin.xuzu");
    }
    public  function  store(){

    }
}
