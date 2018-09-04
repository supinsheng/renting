<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuccessController extends Controller
{
    public  function  success(){
        return view("Weixin.success");
    }
}
