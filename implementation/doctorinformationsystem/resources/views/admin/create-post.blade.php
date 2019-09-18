@extends('layouts.master')
@section('title')
Create new post
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>Create new post</h1>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <form action="/post-store" method="post" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="title">Title </label>
                        <input type="text" class="form-control" 
                        aria-describedby="titleHelp" placeholder="Enter title" name="title">
                        
                    </div>

                    <div class="form-group">
                        <label for="description">Description </label>
                        <input type="textarea" class="form-control"  
                        aria-describedby="descriptionHelp" placeholder="Enter Description"
                         name="description" row=3>
                        
                    </div>

                    <div class="form-group">
                        <label for="image">Select Image </label>
                        <input type="file" class="form-control"  
                        aria-describedby="imageHelp" placeholder="Choose file" name="image">
                        
                    </div>

                    
                    <button type="submit" class="btn btn-success">Create post</button>
                    <a href="/post" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection