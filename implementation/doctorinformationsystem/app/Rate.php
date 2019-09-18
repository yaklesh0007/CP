<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable=['user_id',
    'doctor_id',
    'rating',
    'review',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
