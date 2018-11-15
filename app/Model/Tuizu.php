<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tuizu extends Model
{
    protected $table = 'tuizus';
    protected $fillable = ['realname','cardId','phone','address','village','state','tuizu_cause'];
}
