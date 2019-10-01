@extends('layouts.main')
@section('title')
edit post
@endsection

@section('content')
<div class="container ml-5">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>Edit Post</h1>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="/update-doctorposts/{{$posts->id}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title </label>
                        <input type="text" class="form-control" value="{{$posts->title}}" 
                        aria-describedby="titleHelp" placeholder="Enter title" name="title">
                        
                    </div>

                    <div class="form-group">
                        <label for="description">Description </label>
                        <input type="textarea" class="form-control" value="{{$posts->description}}" 
                        aria-describedby="descriptionHelp" placeholder="Enter Description" name="description"
                         rows="3">
                        
                    </div>

                    <div class="form-group">
                        <label for="image">Select Image </label>
                        <input type="file" class="form-control" id="image" 
                        aria-describedby="imageHelp" placeholder="Enter title" name="image">
                        
                    </div>
                    
                    
                    <button type="submit" class="btn btn-success">Edit post</button>
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