@extends('layouts.app')
@section('title')
Create post
@endsection
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12">
<h1>Create new post</h1>
</div>
<div class="col-md-12">
<form action="{{}}" method="post" enctype="multipart/form-data">
@csrf
        <div class="form-group row">    
                            <label for="titile" class="col-md-4 col-form-label text-md-right">
                            {{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                 name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        </div>

        <div class="form-group row">    
                            <label for="description" class="col-md-4 col-form-label text-md-right">
                            {{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                 name="description" value="{{ old('description') }}" required autocomplete="description"
                                  autofocus rows="3">
                                 </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        </div>


        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
         </div> 

        
</form>
</div>
</div>
</div>
@endsection