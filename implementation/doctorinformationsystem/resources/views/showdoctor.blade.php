@extends('layouts.header')

@section('title')
show doctor details
@endsection

@section('content')
<div class="container mt-4">
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3" >
			  <div class="row no-gutters">
			    <div class="col-md-4">

			      <img src="/images/{{$doctors->image}}" class="card-img ml-4" 
			      alt="image of {{$doctors->name}}" style="height: 300px; width:300px; border-radius: 50%;">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body ">
			        <h5 class="card-title text-success mt-4"><strong> View details</strong></h5>
			        @if(Auth()->check())
			        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Review</a>
			        @else
			        <a href="/login" class="btn btn-success" >Add Review</a>
			        @endif
			        <p class="card-text mt-2">About me:&nbsp{{$doctors->aboutu}}</p>
			        <p>Contact At phone:&nbsp<b class="text-primary">{{$doctors->phone}}</b></p>
			        <p>Email:&nbsp &nbsp <b class="text-primary">{{$doctors->email}}</b></p>
			        <p>Specalist at:&nbsp<b>{{$doctors->specialistat}}</b></p>
			      </div>
			    </div>
			  
			</div>

			</div>

			<!-- Button to Open the Modal -->
			

			<!-- The Modal -->
			<div class="modal" id="myModal">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <!-- Modal Header -->
			      <div class="modal-header">
			        <h4 class="modal-title">Add rewiew</h4>


			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>

			      <!-- Modal body -->
			      <div class="modal-body">
			        <form method="post" action="/store-rating">
			        	{{ method_field('PUT') }}
			        	@csrf
			        	<div class="form-group">
			        		
			        		<label for="rating">select rating out of five</label>
						    <select class="form-control" id="rating" name="rating">
						      <option>1</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
			        	</div>
			        	<div class="form-group">
			        		<label for="review">Review description</label>
			        			
			        		<textarea class="form-control" rows="3" placeholder="Enter details review" name="review"></textarea>
			        	</div>
			        	<div class="form-group">
			        		<input type="hidden" name="doctor_id" value="{{$doctors->id}}">
			        		@if(Auth()->check())
			        		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
			        		@endif()

			        		<input type="submit" name="submit" class="btn btn-success" >
			        	</div>
			        </form>
			      </div>

			      <!-- Modal footer -->
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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