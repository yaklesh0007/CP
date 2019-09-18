@extends('layouts.header')

@section('title')
    Doctor information system
@endsection

@section('content')
<div class="container"> 
    <form action="javascript:;" method="POST">
        <div>
            <select name="location" id="location" class="col-md-6">
                <option value="" class="form-control mt-2">SELECT LOCATION</option>
                @php
                    $locations = $doctors->pluck('location')->unique();
                @endphp
                @foreach($locations as $location)
                <option value="{{ $location }}">{{ ucwords($location) }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <table id="doctor" class="table mt-2">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                    <tr data-location="{{ $doctor->location }}">
                            <td>{{ ucwords($doctor->name) }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ ucwords($doctor->location) }}</td>
                            <td><a class="btn btn-primary" href="/showdoctor/{{$doctor->id}}">Show more details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">

      @php $i=0; @endphp
      @foreach($slider as $data)  

        <li data-target="#carouselExampleCaptions" data-slide-to="{{$i}}" class="
          @if($i == 0) 
            active 

          @endif
        "></li>
        @php $i++; @endphp
      @endforeach
      
    </ol>

    <div class="carousel-inner">
      @php $j=0; @endphp
      @foreach($slider as $data) 
      <div class="carousel-item  
          @if($j == 0) 
            active 

          @endif
          ">
        <img src="/sliders/{{$data->image}}" class="d-block w-100" alt="..." style="height: 600px;">



        <div class="carousel-caption d-none d-md-block">
          <q class="text-success">{{$data->quates}}</q>
          <p>{{$data->whose}}</p>
        </div>
      </div>
       @php $j++; @endphp
    @endforeach

      </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="container-fluid bg-dark">
  <div class="col-md-12 mt-2">
    <h2 style="color: white">Latest Post</h2>
    </div>
        <div class="card-group">
          @foreach ($posts as $data)
              
         
                <div class="card col-md-3">
                <img src="/posts/{{$data->image}}" class="card-img-top"
                 alt="{{$data->title}}'s image" style="height:300px;"
                >
                  <div class="card-body">
                    <h5 class="card-title">{{$data->title}} </h5>
                    <p class="card-text">{{$data->description}}</p>
                  <p class="card-text"><small class="text-muted">{{$data->updated_at}}</small></p>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="col-md-12 text-center mt-2">
              <a href="#" class="btn btn-primary">Read More</a>
              </div>
</div>  
@endsection

@section('scripts')
    
@endsection
