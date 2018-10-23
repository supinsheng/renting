<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Guarantees extends Model
{
    protected $fillable = ['flow_number','username','realname','device_name','img','address','describe','state'];
    protected $table = 'guarantees';
}
