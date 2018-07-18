<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['house_id','village'];
    public $timestamps = false;
}
