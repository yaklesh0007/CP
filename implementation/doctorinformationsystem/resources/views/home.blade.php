@extends('layouts.main')
@section('title')
Dashboard
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/update-userprofile/{{Auth::user()->id}}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" disabled="" placeholder="Company"
                                         value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="name"
                                         value="{{ Auth::user()->name }}" name="name">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" placeholder="Phone"
                                        value="{{ Auth::user()->phone }}" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <input type="text" class="form-control" placeholder="Qualification"
                                         value="{{ Auth::user()->qualification }}" name="qualification">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Speacilist At</label>
                                        <input type="text" class="form-control" placeholder="specialistat"
                                         value="{{ Auth::user()->specialistat }}" name="specialistat">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="City" 
                                        value="{{ Auth::user()->city }}" name="city">
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" class="form-control" placeholder="Location"
                                         value="{{ Auth::user()->location }}" name="location">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" placeholder="Choose image"
                                        name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" 
                                        value="aboutu" name="aboutu">{{ Auth::user()->aboutu }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-image">
                        <img src="/images/{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}'s profile image">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="/images/{{ Auth::user()->image }}" alt="...">
                                <h5 class="title">{{ Auth::user()->name }}</h5>
                            </a>
                            <p class="description">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <p class="description text-center">
                            {{ Auth::user()->aboutu }}
                        </p>
                    </div>
                    <hr>
                    <div class="button-container mr-auto ml-auto">
                        <button href="https://www.facebook.com" class="btn btn-simple btn-link btn-icon">
                            <i class="fa fa-facebook-square"></i>
                        </button>
                        <button href="https://www.twitter.com" class="btn btn-simple btn-link btn-icon">
                            <i class="fa fa-twitter"></i>
                        </button>
                        <button href="https://www.google.com" class="btn btn-simple btn-link btn-icon">
                            <i class="fa fa-google-plus-square"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>



@endsection

@section('scripts')
    
@endsection