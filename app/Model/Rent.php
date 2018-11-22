<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $table = 'rent';
    public $appends = [
        'table',
    ];
    public function getTableAttribute()
    {
        return 'rent';
    }
}
