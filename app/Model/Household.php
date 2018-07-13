<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    protected $fillable = ['username','realname','cardId','phone','address','village'];
}
