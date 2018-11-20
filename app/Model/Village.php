<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = ['name'];
    protected $table = 'villages';
    public $appends = [
        'count'
    ];
    public function getCountAttribute()
    {
        $name = $this->attributes['name'];
        // return $name;
        return Household::where('village',$name)->count();
    }
}
