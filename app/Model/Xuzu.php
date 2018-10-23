<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Xuzu extends Model
{
    protected $table = 'xuzus';
    protected $fillable = ['realname','cardId','phone','address','village','time','state'];
}
