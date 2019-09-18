@extends('layouts.master')
@section('title')
Create new slider
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>Create new slider</h1>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <form action="/slider-store" method="POST" enctype="multipart/form-data">
                    {{-- <input name="_method" type="hidden" value="PUT"> --}}
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="name">Name </label>
                        <input type="text" class="form-control" 
                        aria-describedby="nameHelp" placeholder="Enter Name for slider" name="name">
                        
                    </div>

                    <div class="form-group">
                        <label for="quates">Quates </label>
                        <input type="textarea" class="form-control"  
                        aria-describedby="quatesHelp" placeholder="Enter Quates"
                         name="quates" row="3">
                        
                    </div>

                    <div class="form-group">
                        <label for="whose">Whose </label>
                        <input type="text" class="form-control" 
                        aria-describedby="nameHelp" placeholder="Enter whose quates was it for slider" name="whose">
                        
                    </div>

                    <div class="form-group">
                        <label for="image">Select Image </label>
                        <input type="file" class="form-control"  
                        aria-describedby="imageHelp" placeholder="Choose file" name="image">
                        
                    </div>

                    
                    <button type="submit" class="btn btn-success">Add New Slider</button>
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