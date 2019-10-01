<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use DB;
use App\User;
use Auth;

class AppointmentController extends Controller
{
	public function store(Request $request)
	{
		
		 $appointment=Appointment::create($request->all());
		 return back()->with('status','Succesfully made the appointment');
	}

	public function doctorappointmentindex()
	{
		if(Auth::user())
		{
			$did=Auth::user()->id;
			
			$appointment=DB::table('appointments')
			->where('doctor_id','=',$did)
			->join('users','user_id','=','users.id')
			->select('appointments.*','users.name','users.email')
			->latest()
			->get();
			
			return view('appointment.doctorappointment',compact('appointment'));
		}
	}
	public function doctorappointmentdestroy($id)
	{
		$appointments=Appointment::findorfail($id);
        $appointments->delete();

        return view('appointment.doctorappointment')->with('status','deleted post sucessfully');
	}
	public function index()
	{
		if(Auth::user())
		{
			$did=Auth::user()->id;
			
			$appointment=DB::table('appointments')
			->where('user_id','=',$did)
			->join('users','doctor_id','=','users.id')
			->select('appointments.*','users.name','users.email')
			->get();
			
			return view('appointment.usersappointment',compact('appointment'));
		}
	}
	public function destroy($id)
	{
		$appointments=Appointment::findorfail($id);
        $appointments->delete();

        return view('appointment.usersappointment')->with('status','deleted post sucessfully');
	}

}
