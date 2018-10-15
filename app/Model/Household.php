<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Household extends Model
{
    protected $fillable = ['username','realname','cardId','phone','address','village','time','start','contract','peoples','remarks'];


    public function getAll()
    {
        $data = Household::get();

        $arr = [];
        foreach($data as $v)
        {
            $rent = Rent::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $water= Water::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $property = Property::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $electric = Electric::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $arr[] = [
                'id' => $v['id'],
                'rent' => $rent['money'],
                'rent_state' => $rent['state'],
                'water' => $water['money'],
                'water_state' => $water['state'],
                'property' => $property['money'],
                'property_state' => $property['state'],
                'electric' => $electric['money'],
                'electric_state' => $electric['state'],
                'realname' => $v['realname'],
                'username' => $v['username'],
                'date' => date('Y-m'),
            ]; 

        }

        return $arr;
    }

    public function list()
    {
        $data = Household::get();

        $arr = [];
        foreach($data as $v)
        {
            $rent = Rent::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $water= Water::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $electric = Electric::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $arr[] = [
                'id' => $v['id'],
                'rent' => $rent['money'],
                'water' => $water['money'],
                'electric' => $electric['money'],
                'realname' => $v['realname'],
                'username' => $v['username'],
                'address' => $v['address'],
                'village' => $v['village'],
                'phone' => $v['phone'],
                'cardId' => $v['cardId'],
            ]; 

        }

        return $arr;

    }
}
