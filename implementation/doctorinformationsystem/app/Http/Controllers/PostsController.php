<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;
use Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function welcomeindex()
    {
        $posts = \App\Post::latest()->get();
         return view('welcompagepost', compact('posts'));
    }
    public function doctorposts()
    {
        $check=Auth::check();
        $uid=Auth::user()->id;
        
        $posts=Post::where('user_id',$uid)
        ->latest()
        ->paginate(5);
        
        return view('posts.index',compact('posts'))
        ->with('i',(request()->input('page',1) -1)*5);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image'=>['file|image','max:5000'],
            
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        
        $posts=new Post();
        $posts->title=$request->input('title');
        $posts->description=$request->input('description');
        $posts->user_id=$request->input('user_id');

        if($request->hasfile('image'))
        {
            
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().".".$ext;
            
            // $file->move(public_path('posts/'.$filename));
           $image=Image::make($file)->resize(300,300)->save(public_path('posts/'.$filename));
           
            $posts->image=$filename;
        }
        $posts->save();
        return redirect('doctorposts')->with('status','Sucessfully added post');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $posts=Post::findorfail($id);
        return view('posts.edit')->with('posts',$posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $posts=Post::find($id);
        $posts->title=$request->input('title');
        $posts->description=$request->input('description');
        if($request->hasFile('image'))
        {
            
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().".".$ext;
            //$file->move(public_path('posts/'.$filename));
            $image=Image::make($file)->resize(600,600)->save(public_path('posts/'.$filename));
            $posts->image=$filename;
        }
        $posts->update();
        return redirect('doctorposts')->with('status','updated post sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $posts=Post::findorfail($id);
        $posts->delete();

        return redirect('doctorposts')->with('status','deleted post sucessfully');
    }
    
}
