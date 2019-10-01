<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;
use App\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks=Feedback::latest()->paginate(5);
        return view('admin.feedback',compact('feedbacks'))
        ->with('i',(request()->input('page',1) -1)*5);
    }

    public function destroy($id)
    {
    	$feedbacks=Feedback::findorfail($id);
        $feedbacks->delete();

        return redirect('/feedback')->with('status','deleted post sucessfully');
    }
}
