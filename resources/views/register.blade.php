@extends('app')

@section('title', 'Register')

@section('content')

	<div class="notify" style="margin: 20px 0;">
		@if(isset($status) && $status === 'error' && !empty($data))
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach($data as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>

    <form action="{{URL::to('/register')}}" method="POST">
      @csrf
	  <div class="form-group">
	    <label for="exampleInputEmail1">Name</label>
	    <input type="text" class="form-control" required name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Email</label>
	    <input type="text" class="form-control" required name="email" placeholder="Enter Email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Mobile</label>
	    <input type="number" class="form-control" required name="mobile" placeholder="Enter Mobile">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Age</label>
	    <input type="number" class="form-control" required name="age" placeholder="Enter Age">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" required name="password" placeholder="Enter Password">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Confirm Password</label>
	    <input type="password" class="form-control" required name="confirm_password" placeholder="Enter Confirm Password">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection