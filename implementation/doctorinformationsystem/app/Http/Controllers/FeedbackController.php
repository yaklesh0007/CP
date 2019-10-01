<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
	public function index()
    {
        $feedbacks=Feedback::latest()->paginate(5);
        return view('feedbacks.index',compact('feedbacks'))
        ->with('i',(request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        
        $feedbacks= new feedback();
       
           $feedbacks->title=$request->input('title');
           $feedbacks->description=$request->input('description');
           $feedbacks->user_id=$request->input('user_id');
           // dd($feedbacks);
           $feedbacks->save();
        
        
            return back()
            ->with('status' , 'feedback thankyou for your feedbacks');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(feedback $feedback)
    {
        $feedback = Feedback::find($feedback->id);

        return view('feedbacks.show', ['feedback'=>$feedback]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(feedback $feedback)
    {
        $feedback = Feedback::find($feedback->id);
        
        return view('feedbacks.edit',compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, feedback $feedback)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $feedbackUpdate = Feedback::where('id', $feedback->id)
                                ->update([
                                        'title'=> $request->input('title'),
                                        'description'=>$request->input('description')
                                ]);

      if($feedbackUpdate){
          return redirect()->route('feedbacks.index')
          ->with('status' , 'feedback updated successfully');
      }
      //redirect
      return back()->with('status','!!oops something went wrong ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(feedback $feedback)
    {
        $findFeedback = Feedback::find( $feedback->id);
		if($findFeedback->delete()){
            
            //redirect
            return redirect()->route('feedbacks.index')
            ->with('status' , 'feedback deleted successfully');
        }

        return back()->withInput()->with('status' , 'feedbacks could not be deleted');
    }    
}
