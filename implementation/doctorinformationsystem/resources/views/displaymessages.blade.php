@extends('layouts.header')
@section('title')
  Show the all posted message  
@endsection
@section('content')

<div class="container">
<div class="col-md-10 gedf-main">

  
   <div class="card gedf-card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mr-2">
                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                </div>
                <div class="ml-2">
                    <div class="h5 m-0">@LeeCross</div>
                    <div class="h7 text-muted">Miracles Lee Cross</div>
                </div>
            </div>
            <div>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-ellipsis-v"></i>
                </a>
              
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
                
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>10 min ago</div>
        <a class="card-link" href="#">
            <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adip.</h5>
        </a>

        <p class="card-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor
            sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates.
        </p>
    </div>
    <div class="card-footer">
        
        <a href="#" class="card-link"><i class="far fa-heart"></i> Love</a>
        <a href="#" class="card-link"><i class="fa fa-comment"></i>Reply</a>
        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
    </div>
</div>
<!-- Post /////-->
</div>
  <!-- Post /////--> 
</div>  
@endsection

@section('scripts')
    
@endsection