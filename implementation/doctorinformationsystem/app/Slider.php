<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable=['name',
    'quates','whose','user_id'
];
public function user()
    {
        return $this->belongsTo('App\User');
    }
}
