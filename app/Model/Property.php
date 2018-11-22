<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public $appends = [
        'table'
    ];
    public function getTableAttribute()
    {
        return 'property';
    }
}
