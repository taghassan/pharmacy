<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class drugs extends Model
{
    protected $table = 'drugs';
    public $timestamps = true;
    protected $fillable = array('name','m_name','uses','pharmacy','status','side_effect');

    function pharmacys(){
        return $this->belongsTo('App\pharmacy','pharmacy','id');
    }

}
