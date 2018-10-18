<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class House extends Model
{
    protected $fillable = ['house_id','village','house_area','rent'];
    public $timestamps = false;

    public function household()
    {
        return $this->belongsTo(Household::class,'house_id');
    }
}
