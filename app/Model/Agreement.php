<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    public $fillable = ['title','description'];
    protected $table = 'agreements';
}
