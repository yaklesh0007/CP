<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;
use App\Doctor;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('profile')->with('user', Auth::user());
    }

    public function profileupdate(Request $request)
    {
        if($request->hasFile('image'))
        {
            $request->validate([
                'image'=>'file|image','max:2048',
            ]);
            $image=$request->file('image');
            $filename=rand(0,99999).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save(public_path('images/'.$filename));

            $user=Auth::user();
            $user->image=$filename;
            $user->save();
        }
        return redirect('profile')->with('status','Sucessfully update profile picture');
    }
   public function show($id)
    {
         $doctors=Doctor::findorfail($id);
        return view('showdoctor')->with('doctors',$doctors);
    }

    public function updateuser(Request $request,$id)
    {
        
        if($request->hasFile('image'))
        {
            $request->validate([
                'image'=>'file|image','max:2048',

            ]);
            $image=$request->file('image');
            $filename=rand(0,99999).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save(public_path('images/'.$filename));

            $user=Auth::user();
            $user->image=$filename;
            $user->name=$request->input('name');
            $user->phone=$request->input('phone');
            $user->qualification=$request->input('qualification');
            $user->city=$request->input('city');
            $user->specialistat=$request->input('specialistat');
            $user->location=$request->input('location');
            $user->aboutu=$request->input('aboutu');
            $user->save();
        }
        return redirect('home')->with('status','Sucessfully update profile ');
    }
}
