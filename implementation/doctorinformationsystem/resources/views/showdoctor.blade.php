@extends('layouts.header')

@section('title')
show doctor details
@endsection

@section('content')
@if(session('status'))
                <div class="alert alert-success">
                {{session('status')}}
                </div>
@endif
<div class="container mt-5">
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

					
					<p class="card-text mt-2">Ratings:&nbsp
						@for($i=1;$i<=5;$i++)
							<i	class="fa fa-star" style="color: @if(round($doctors->avgRating()) >= $i) orange @else gray @endif;"></i>
						@endfor
						</p>
					
					

			        <p class="card-text mt-2">About me:&nbsp{{$doctors->aboutu}}</p>
			        <p>Contact At phone:&nbsp<b class="text-primary">{{$doctors->phone}}</b></p>
			        <p>Email:&nbsp &nbsp <b class="text-primary">{{$doctors->email}}</b></p>
			        <p>Specalist at:&nbsp<b>{{$doctors->specialistat}}</b></p>
			        @if(Auth()->check())
			        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal2">Make Appointment</a>
			        @else
			        <a href="/login" class="btn btn-success" >Make Appointment</a>
			        @endif
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
			        		
			        		<label for="rating">select rating out of five: </label>
						    
							 @for($i=1; $i<=5;$i++)
							 
						     	<i class="fa fa-star rating-stars" data-star="{{ $i }}" style="color:gray;"></i>
						     @endfor
						     <input type="hidden" name="rating" id="rate" required>
			        	</div>
			        	<div class="form-group">
			        		<label for="review">Review description</label>
			        			
			        		<textarea class="form-control" rows="3" placeholder="Enter details review" name="review" required></textarea>
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


			<!-- The Modal 2 -->
			<div class="modal" id="myModal2">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <!-- Modal Header -->
			      <div class="modal-header">
			        <h4 class="modal-title">Make Appointment</h4>


			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>

			      <!-- Modal body -->
			      <div class="modal-body">
			        <form method="post" action="/store-appointment">
			        	{{ method_field('PUT') }}
			        	@csrf
			        	<div class="form-group">
			        		<label>Appointment for</label>
			        		<input type="text" name="title" class="form-control" required>
			        	</div>
			        	<div class="form-group">
			        		<label>Pick time</label>
			        		<input type="datetime-local" name="time" required>
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
<script type="text/javascript">
	
	$(function() {
		$('.rating-stars').on('click', function(e) {

			const rate = $(this).attr('data-star');
			let color = 'orange';

			$('#rate').val(rate);

			$('.rating-stars').each(function(i, el) {

				if(rate == i) color = 'gray';
				$(el).attr('style', 'color:'+ color);

			});			

		});
	});

</script>
@endsection