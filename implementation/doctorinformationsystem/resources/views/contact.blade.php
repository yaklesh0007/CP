@extends('layouts.header')

@section('title')
Contact Us
@endsection


@section('content')
@if(session('status'))
                <div class="alert alert-success">
                {{session('status')}}
                </div>
@endif
<div class="container pd-10">
  <div class="row">
    <div class="col-md 12">
          <div class="card mb-3" >
            <div class="row no-gutters">
              <div class="col-md-6">
                <img src="/contactus/contact.jpg" class="card-img" alt="image of contact">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <form method="post" action="/store-feedback">
                    @csrf
                    {{ method_field('PUT') }}
                    <fieldset>
                      <legend>Contact us</legend>
                      <div class="form-group">
                        <label>
                          Title
                        </label>
                        <input type="text" name="title" class="form-control" 
                        placeholder="Enter the Title" required>
                        @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>

                      <div class="form-group">
                        <label>
                          DESCRIPTION
                        </label>
                        <textarea name="description" class="form-control" 
                        placeholder="Enter your feedback" rows="3" required></textarea>
                        @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                      </div>
                      @if(Auth()->check())
                       <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="submit" name="submit" class="btn btn-success">
                        @else
                        <a href="/login" class="btn btn-success" >Submit</a>
                        @endif
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>
<!-- for map -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21001.406641594644!2d2.2939613962064276!3d48.85485741154503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6702864536459%3A0x50b82c368941ab0!2s7th%20arrondissement%20of%20Paris%2C%2075007%20Paris%2C%20France!5e0!3m2!1sen!2snp!4v1568798651343!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
  </div>
</div>

@endsection


@section('scripts')
@endsection