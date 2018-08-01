<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Household;
use DB;
class ChartsController extends Controller
{
    public function main(){
        $date = 1;
        $end = date("Y-m-d");
        $m = 7;
        $time = strtotime($end) - 3600*24*30*$m;
        $start = date('Y-m-d',$time); 
        // $data = Household::get();
        // $data = DB::table('properties')->select('id','username',DB::raw('(water_rent+power_rate+rent+property_fee+other_expenses) as nums'))->get();
        // $data = Household::leftJoin('properties','Household')
        $data = DB::table('households')
                    ->leftJoin('properties','households.username','=','properties.username')
                    ->select('village',DB::raw('(water_rent+power_rate+rent+property_fee+other_expenses) as moneys'),'is_pay','data','address')
                    ->whereBetween('start',[$start,$end])
                    ->get();
        // $pays = DB::table('payments')
        //             ->leftJoin('households','households.id','=','payments.holds_id')
        //             ->select('payments.*','households.village')
        //             ->get();
        $villages = DB::table('villages')->select('id','name')->get();
        // return $pays;
        // $pros = DB::table('properties')
        //             ->select()
        // return $data;
        return view('core.charts',[
            'data'=>$data,
            // 'pays'=>$pays,
            'villages'=>$villages
        ]);
    }
}
