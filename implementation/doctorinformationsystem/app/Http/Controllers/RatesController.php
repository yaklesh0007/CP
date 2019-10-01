<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rate;
use Auth;

class RatesController extends Controller
{
   public function store(Request $request)
   {
   	 $rate=Rate::create($request->all());

   	 return back()->with('status','Thank you for your rating !!!');
   }

}
