<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Image;

use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    public function index()
    {
        $posts=Post::latest()->paginate(5);
        return view('admin.post',compact('posts'))
        ->with('i',(request()->input('page',1) -1)*5);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image'=>['file|image','max:2048'],
            
        ]);
    }

    public function create()
    {
        return view('admin.create-post');
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
        return redirect('post')->with('status','Sucessfully added post');
    }
    public function show(Post $post)
    {
        //
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
        return view('admin.edit-post')->with('posts',$posts);
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
            $image=Image::make($file)->resize(300,300)->save(public_path('posts/'.$filename));
            $posts->image=$filename;
        }
        $posts->update();
        return redirect('/post')->with('status','updated post sucessfully');
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

        return redirect('/post')->with('status','deleted post sucessfully');
    }
}
