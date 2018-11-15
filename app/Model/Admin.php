<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    public $fillable = ['name','passwd','jurisdiction'];
    protected $table = 'admins';
}
