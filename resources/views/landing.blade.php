@extends('app')

@section('title', 'Landing')

@section('content')
	<style type="text/css">
		.landing {
			margin-top: 20px;
		}
		.notify {
			margin: 20px 0;
		}
		img {
			width: 100%;
			height: 100px;
		}
	</style>


	<div class="notify">
		@if(isset($status) && $status == 'success')
			<div class="alert alert-success" role="alert">
			  User Registration has been completed sucessfully
			</div>
		@endif
	</div>


	<div class="landing">
		@if(isset($books) && !empty($books))
			<div class="row">
				@foreach($books as $book)
				  <div class="col-md-3" style="margin-bottom: 10px">
					<div class="card">
					  <img src="{{$book['image']}}" class="card-img-top">
					  <div class="card-body">
					    <h5 class="card-title">{{$book['name']}}</h5>
					    <p class="card-text">{{$book['description']}}</p>
					    By <span>{{$book['author']}}</span> <br>
					    <button class="btn btn-primary addToCart">Add to cart</button>
					  </div>
					</div>
				  </div>
				@endforeach
			</div>
		@else
			<h5 align="center">No books data found to display</h5>
		@endif
	</div>
@endsection

@section('JS')
	<script type="text/javascript">
		$('.addToCart').click(function(){
			alert('this item is added to the cart');
		})
	</script>
@endsection