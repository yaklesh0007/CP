<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends User
{
    protected $table="users";
    

    public function ratings(){
        return $this->hasMany('App\Rate');
    }
}
