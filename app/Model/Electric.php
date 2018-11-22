<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Electric extends Model
{
    protected $table = 'electric';

    public $appends = [
        'table'
    ];
    public function getTableAttribute()
    {
        return 'electric';
    }
    
}
