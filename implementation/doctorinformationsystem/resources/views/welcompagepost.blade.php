@extends('layouts.header')

@section('title')
Latest posts
@endsection

@section('content')
<div class="container mt-5">
	<div class="row">
		<div class="col-md-10">
			@foreach($posts as $data)
			<div class="card mb-3">
			  <img src="/posts/{{$data->image}}" class="card-img-top rounded" alt="image of {{$data->title}}"
			  style="height: 400px;">
			  <div class="card-body">
			    <h5 class="card-title">{{$data->title}}</h5>
			    <p class="card-text">{{$data->description}}</p>
			    <p class="card-text"><small class="text-muted">Last Updated At:&nbsp{{$data->updated_at}}</small></p>
			  </div>
			  <div class="card-footer">
        
					<a href="#" class="card-link"><i class="far fa-heart"></i> Love</a>
					<a href="#" id="comment" class="card-link"><i class="fa fa-comment"></i>Reply</a>
					<a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
				</div>
				<div class="border" id="commentform">
					<form action="" method="post">
						<input type="text" class="form-control" id="inputcomment">
					</form>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">
	
	$(function(){

		
		$("#commentform").hide();

		$("#inputcomment").hide();

		$("#comment").click(function(){
			$("#commentform").show(1000);
			$("#inputcomment").show(1000);
		});
		// $("#comment").doubleclick(function())
		// {
		// 	$("#commentform").hide();

		// 	$("#inputcomment").hide();
		// }

	});

</script>
@endsection