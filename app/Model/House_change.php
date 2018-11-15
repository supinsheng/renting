<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class House_change extends Model
{
    protected $fillable = ['now-fw','change-fw','shuoming'];
    protected $table = 'houseChanges';
}
