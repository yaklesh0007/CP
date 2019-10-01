<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable=
    ['title',
    'time',
    'doctor_id',
    'user_id'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
