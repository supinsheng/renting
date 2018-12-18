<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Rent;
use App\Model\Water;
use App\Model\Electric;
use App\Model\Property;
use DB;
class Household extends Model
{
    protected $fillable = ['username','realname','cardId','phone','address','village','time','start','contract','peoples','remarks','electric_meter','water_meter'];
    protected $table = 'households';
    public $appends = [
        'paid',
        'unpaid'
    ];
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
    public function getData($data)
    {
        $arr = [];
        foreach($data as $v)
        {
            $rent = Rent::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();
            $arr[] = [
                'id' => $v['id'], 
                'village' => $v['village'],
                'realname' => $v['realname'],
                'username' => $v['username'],
                'peoples' => $v['peoples'],
                'phone' => $v['phone'],
                'cardId' => $v['cardId'],
                'start' => $v['start'],
                'house_area' => $v['house_area'],
                'rent' => $rent['money'],
                'rent_state' => $rent['state'],
                'remarks' => $v['remarks'],
            ]; 

        }

        return $arr;
    }
    public function list($data)
    {

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

    public function house(){
        return $this->hasOne(House::class,'adress');
    }

    public function getPaidAttribute()
    {
        $id = $this->attributes['id'];
        $money = 0;
        $rent = Rent::select('money')->where([
            ['date','=' ,date("Y-m")],
            ['state','=','1'],
            ['user_id','=',$id],
        ])->first();
        if($rent){
            $money += $rent->money;
        }
        $water = Water::select('money')->where([
            ['date','=' ,date("Y-m")],
            ['state','=','1'],
            ['user_id','=',$id],
        ])->first();
        if($water){
            $money += $water->money;
        }
        $elec = Electric::select('money')->where([
            ['date','=' ,date("Y-m")],
            ['user_id','=',$id],
            ['state','=','1'],
        ])->first();
        if($elec){
            $money += $elec->money;
        }
        $prop = Property::select('money')->where([
            ['date','=' ,date("Y-m")],
            ['user_id','=',$id],
            ['state','=','1'],
        ])->first();
        if($prop){
            $money += $prop->money;
        }
        return $money;

    }
    public function getUnpaidAttribute()
    {
        $id = $this->attributes['id'];
        $money = 0;
        $rent = Rent::select('money')->where([
            ['date','=' ,date("Y-m")],
            ['state','=','0'],
            ['user_id','=',$id],
        ])->first();
        if($rent){
            $money += $rent->money;
        }
        $water = Water::select('money')->where([
            ['date','=' ,date("Y-m")],
            ['state','=','0'],
            ['user_id','=',$id],
        ])->first();
        if($water){
            $money += $water->money;
        }
        $elec = Electric::select('money')->where([
            ['date','=' ,date("Y-m")],
            ['user_id','=',$id],
            ['state','=','0'],
        ])->first();
        if($elec){
            $money += $elec->money;
        }
        $prop = Property::select('money')->where([
            ['date','=' ,date("Y-m")],
            ['user_id','=',$id],
            ['state','=','0'],
        ])->first();
        if($prop){
            $money += $prop->money;
        }
        return $money;

    }
}
