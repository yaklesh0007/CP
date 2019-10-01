@extends('layouts.header')

@section('title')
    Doctor information system
@endsection

@section('content')

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
        <img src="/sliders/{{$data->image}}" class="d-block w-100" alt="..." style="height: 400px;">



        <div class="carousel-caption d-none d-md-block">
          <q >{{$data->quates}}</q>
          <p >{{$data->whose}}</p>
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
<div class="container mt-2">
  <div class="card mb-3" >
    <div class="row no-gutters">
      <div class="col-md-5">
        <img src="/logo/search.jpg" class="card-img" alt="..." height="100%;">
      </div>
      <div class="col-md-7">
        <div class="card-body">
           
            <form action="javascript:;" method="POST">
                <div>
                    <select name="location" id="location" class="col-md-6">
                        <option value="" class="form-control ">SELECT LOCATION</option>
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
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mb-4">
  <div class="col-md-12 mt-2">
    <h2 style="color:green">Latest Post</h2>
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
              <a href="/welcompagepost" class="btn btn-primary">Read More</a>
              </div>
</div>  
<div class="container">
  <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-md-5">
        <img src="/logo/ask.jpg" class="card-img" alt="...">
      </div>
      <div class="col-md-7">
        <div class="card-body">
          <div class="bg-primary">
          <h2 class="card-title text-center">Ask your Query</h2>
          @if(session('status'))
                <div class="alert alert-success">
                {{session('status')}}
                </div>
          @endif
          </div>
          <div class="text-right">
          @if(Auth::user())
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
           Ask Question
          </button>
          @else
          <a href="/login" class="btn btn-primary mr-auto">Ask questions</a>
          @endif
          </div>
          @foreach ($messages as $item)
              
          
          <div class="border mt-2">
              <div class="mr-2">
              <img class="rounded-circle" width="45" src="/images/{{$item->image}}" alt="">
              </div>
              <div class="ml-2">
              <div class="h5 m-0 text-primary">{{$item->email}}</div>
              
              </div>
              <div class="ml-2 mt-2 border mr-2">
              <h6>Title:&nbsp<b class="text-success">{{$item->title}}</b></h6>
              <p>Message:&nbsp<b class="text-primary">{{$item->body}}</b></p>
              <p class="text-muted">post at:&nbsp{{$item->updated_at}}</p>
              </div>
          </div>
          @endforeach
          <div class="col-md-12 border mt-2">
           
            <a href="/displaymessage" class="btn btn-primary text-center">See more posted Questions</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Post Question </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="store-message" method="post">
            @csrf
            {{-- @method('PUT') --}}
            <div class="form-group">
                <label for="title" class="col-form-label">Tltle:</label>
                <input type="text" class="form-control" name="title" required maxlength="255">
              </div>
              <div class="form-group">
                <label for="body" class="col-form-label">Message:</label>
                <textarea class="form-control" name="body" required></textarea>
              </div>
              @if(Auth::user())
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            @endif
              <input type="submit" class="btn btn-primary">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
    
@endsection
