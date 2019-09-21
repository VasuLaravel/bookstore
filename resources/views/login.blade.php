@extends('app')

@section('title', 'Login')

@section('content')

	<div class="notify" style="margin: 20px 0;">
		@if(isset($errors) && !empty($errors))
			<div class="alert alert-danger" role="alert">
				{{$errors}}
			</div>
		@endif
	</div>

    <form action="{{URL::to('/login')}}" method="POST">
      @csrf
	  <div class="form-group">
	    <label for="exampleInputPassword1">Email</label>
	    <input type="email" class="form-control" name="email" placeholder="Enter Email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" name="password" placeholder="Enter Password">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection