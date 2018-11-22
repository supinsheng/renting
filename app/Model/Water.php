<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    protected $table = 'water';

    public $appends = [
        'table'
    ] ;

    public function getTableAttribute()
    {
        return 'water';
    }
}
