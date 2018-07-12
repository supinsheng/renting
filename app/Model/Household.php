<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    protected $fillable = ['realname','phone','address','village'];
}
