<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Image;
use Auth;

class DashboardController extends Controller
{
    public function registered()
    {
        $users=User::all();
        return view('admin.register')->with('users',$users);
    }
    public function registeredit(Request $request,$id)
    {
        $users=User::findorfail($id);
        return view('admin.register-edit')->with('users',$users);
    }
    public function registerupdate(Request $request,$id)
    {
        $users=User::find($id);
        $users->email=$request->input('email');
        $users->role_id=$request->input('role_id');
        $users->update();
        return redirect('/role-register')->with('status','updated role id of user sucessfully');
    }

    public function registerdelete($id)
    {
        $users=User::findorfail($id);
        $users->delete();

        return redirect('/role-register')->with('status','deleted user sucessfully');
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
        return redirect('dashboard')->with('status','Sucessfully update profile picture');
    }
}
