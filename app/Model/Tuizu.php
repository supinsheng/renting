<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tuizu extends Model
{
    protected $fillable = ['realname','cardId','phone','address','village','state','tuizu_cause'];
}
