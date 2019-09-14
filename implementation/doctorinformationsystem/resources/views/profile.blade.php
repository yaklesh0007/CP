@extends('layouts.app')

@section('title')
 profile
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">User Profile </div>
                @if(session('status'))
                    <div class="alert alert-success">
                    {{session('status')}}
                    </div>
                @endif
                <div class="card-body">
                <img src="/images/{{$user->image}}" alt="profile picture of user" 
                style="width:150px; height:150px; float:left; border-radius:50%; margin-right:50px;">
                <h1>{{$user->name}}'s profile</h1>
                <h6 class="text-muted">{{$user->aboutu}}</h6>
                <form action="/update-profile" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                <label for="image" >Update profile image</label>
                <input type="file" name="image" >
                </div>
                <input type="submit" class="btn btn-primary btn-sm pull-rigth">
                </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
