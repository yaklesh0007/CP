@extends('layouts.master')
@section('title')
edit slider
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>Edit users</h1>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <form action="/update-slider/{{$sliders->id}}" method="post" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name </label>
                        <input type="text" class="form-control" value="{{$sliders->name}}" 
                        aria-describedby="nameHelp" placeholder="Enter name of slider" name="name">
                        
                    </div>

                    <div class="form-group">
                        <label for="quates">Quates </label>
                        <input type="textarea" class="form-control" value="{{$sliders->quates}}" 
                        aria-describedby="quatesHelp" placeholder="Enter quates related to slider"
                         name="quates"
                         row="3">
                        
                    </div>

                    <div class="form-group">
                        <label for="whose">Whose </label>
                        <input type="text" class="form-control" value="{{$sliders->whose}}" 
                        aria-describedby="whoseHelp" placeholder="Enter name of person says quates" name="whose">
                        
                    </div>

                    <div class="form-group">
                        <label for="image">Select Image </label>
                        <input type="file" class="form-control"  
                        aria-describedby="imageHelp" placeholder="Enter title" name="image">
                        
                    </div>
                    
                    
                    <button type="submit" class="btn btn-success">Update slider</button>
                    <a href="/slider" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection