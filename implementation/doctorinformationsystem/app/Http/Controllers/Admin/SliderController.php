<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Auth;
use Image;
use App\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders=Slider::latest()->paginate(5);
        return view('admin.slider',compact('sliders'))
        ->with('i',(request()->input('page',1) -1)*5);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'quates' => ['required', 'string'],
            'image'=>['file|image','max:2048'],
            
        ]);
    }

    public function create()
    {
        return view('admin.create-slider');
    }

    public function store(Request $request)
    {
       
        $sliders=new Slider();
        $sliders->name=$request->input('name');
        $sliders->quates=$request->input('quates');
        $sliders->whose=$request->input('whose');
        $sliders->user_id=$request->input('user_id');

        if($request->hasfile('image'))
        {
            
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().".".$ext;
            
            //$file->move(public_path('sliders/'.$filename));
            $image=Image::make($file)->resize(300,300)->save(public_path('sliders/'.$filename));
            
            $sliders->image=$filename;

        }
        $sliders->save();
        return redirect('slider')->with('status','Sucessfully added Slider');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $Slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $sliders=Slider::findorfail($id);
        return view('admin.edit-Slider')->with('sliders',$sliders);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $Slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $sliders=Slider::find($id);
        $sliders->name=$request->input('name');
        $sliders->quates=$request->input('quates');
        $sliders->whose=$request->input('whose');
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().".".$ext;
            //$file->move(public_path('sliders/'.$filename));
            $image=Image::make($file)->resize(300,300)->save(public_path('sliders/'.$filename));
            $sliders->image=$filename;
        }
        $sliders->update();
        return redirect('/slider')->with('status','updated Slider sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $Slider
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $sliders=Slider::findorfail($id);
        $sliders->delete();

        return redirect('/slider')->with('status','deleted Slider sucessfully');
    }
}
