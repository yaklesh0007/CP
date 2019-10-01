@extends('layouts.main')
@section('title')
Create new post
@endsection

@section('content')
<div class="container ml-5">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>Create new post</h1>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="/post-doctorstore" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                    <div class="form-group">
                        <label for="title">Title </label>
                        <input type="text" class="form-control" 
                        aria-describedby="titleHelp" placeholder="Enter title" name="title" required>
                        
                    </div>

                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea name="description"  rows="3" required placeholder="Enter description" class="form-control">

                        </textarea>
                        
                    </div>

                    <div class="form-group">
                        <label for="image">Select Image </label>
                        <input type="file" class="form-control"  
                        aria-describedby="imageHelp" placeholder="Choose file" name="image" required>
                        
                    </div>

                    
                    <button type="submit" class="btn btn-success">Create post</button>
                    <a href="/doctorposts" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection