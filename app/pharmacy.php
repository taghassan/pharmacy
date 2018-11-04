<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pharmacy extends Model
{
    protected $table = 'pharmacy';
    public $timestamps = true;
    protected $fillable = array('name','disc','lon','lat','phone_no');

    function user(){
        return $this->hasMany('App\User','pharmacy','id');

    }

}
