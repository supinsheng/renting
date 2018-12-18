<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\HouseExport;
use Maatwebsite\Excel\Facades\Excel;
class ExportController extends Controller
{
    function index() {
        $date = date("Y-m-d");
        return Excel::download(new HouseExport, '财务报表-'.$date.'.xlsx');
    }
}
