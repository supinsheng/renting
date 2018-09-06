<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TuizuController extends Controller
{
    public  function  index(){
        return  view("Weixin.tuizu");
    }
    public  function  store(){

    }
}
