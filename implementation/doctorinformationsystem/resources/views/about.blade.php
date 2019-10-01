@extends('layouts.header')

@section('title')
  About us  
@endsection

@section('content')
<div class="container mt-5">
<div class="card mb-3" >
        <div class="row no-gutters">
          <div class="col-md-6">
            <img src="/aboutus/about.jpg" class="card-img" alt="image of a building"
            style="height: 300px;">
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <h5 class="card-title">About us</h5>
              <p class="card-text">Welcome to the Dummy Text Generator!</p>
              <p class="card-text">We are gradually adding new functionality and we welcome your suggestions and feedback</p>
              <p class="card-text">Please feel free to send us any additional dummy texts</p>
            </div>
          </div>
        </div>
      </div>
      </div>
@endsection

@section('scripts')
    
@endsection