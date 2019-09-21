@extends('app')

@section('title', 'Landing')

@section('content')
	<style type="text/css">
		.landing {
			margin-top: 200px;
    		text-align: center;
		}
		.notify {
			margin: 20px 0;
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
		<h3>welcome to Book store</h3>
	</div>
@endsection