<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    protected $fillable = ['username','password','realname','cardId','phone','address','village','time','start'];
}
