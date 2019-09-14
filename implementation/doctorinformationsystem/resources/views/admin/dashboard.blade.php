@extends('layouts.master')
@section('title')
Admin dashboard
@endsection

@section('content')
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">User Profile </div>
                @if(session('status'))
                    <div class="alert alert-success">
                    {{session('status')}}
                    </div>
                @endif
                <div class="card-body">
                <img src="/images/{{ Auth::user()->image }}" alt="profile picture of user" 
                style="width:150px; height:150px; float:left; border-radius:50%; margin-right:50px;">
                <h1>{{ Auth::user()->name }}'s profile</h1>
                <h6 class="text-muted">{{ Auth::user()->aboutu }}</h6>
                <form action="/update-admin-profile" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                <label for="image" >Update profile image</label>
                <input type="file" name="image"  class="btn btn-primary">
                </div>
                <input type="submit" class="btn btn-primary btn-sm pull-rigth">
                </form>
                </div>
                
            </div>
        </div>
    </div>
 @endsection
 @section('scripts')
 @endsection
