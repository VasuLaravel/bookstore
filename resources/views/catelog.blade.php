@extends('app')

@section('title', 'Catelog')

@section('content')

	<style type="text/css">
		img {
			width: 80px;
    		height: 80px;
		}
	</style>

	<div class="row">
		<div class="col-md-12" align="right">
			<button 
				type="button"
				class="btn btn-primary addBooksBtn">
			  Add Books
			</button>
		</div>
	</div>

	<div class="row" style="margin-top: 30px;">
		<div class="col-md-12">
			<table class="table table-bordered">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Image</th>
			      <th scope="col">Book Name</th>
			      <th scope="col">Price</th>
			      <th scope="col">Description</th>
			      <th scope="col">Author</th>
			      <th scope="col">Published at</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if(isset($books) && !empty($books))
			  		@foreach($books as $book)
			  			<tr>
			  				<td>
			  					<img src="{{$book['image']}}" >
			  				</td>
			  				<td>{{$book['name']}}</td>
			  				<td>{{$book['price']}}</td>
			  				<td>{{$book['description']}}</td>
			  				<td>{{$book['author']}}</td>
			  				<td>{{$book['published_at']}}</td>
			  				<td>
			  					<button 
				  					class="editBtn btn btn-success" 
				  					data-id="{{$book['id']}}"
				  					data-name="{{$book['name']}}"
				  					data-price="{{$book['price']}}"
				  					data-description="{{$book['description']}}"
				  					data-author="{{$book['author']}}"
				  					data-published_at="{{$book['published_at']}}"
				  					data-image="{{$book['image']}}">
				  					Edit
			  					</button>
			  					<button 
				  					class="delBtn btn btn-danger" 
				  					data-id="{{$book['id']}}">
				  					Delete
			  					</button>
			  				</td>
			  			</tr>
			  		@endforeach
			  	@endif
			  </tbody>
			</table>
		</div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Books</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="POST" id="booksModal">
		      @csrf
		      <input type="hidden" name="id" id="id">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" required name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">price</label>
			    <input type="text" class="form-control" required id="price" placeholder="Enter price">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">description</label>
			    <input type="text" class="form-control" required id="description" placeholder="description">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">author</label>
			    <input type="text" class="form-control" required id="author" placeholder="Enter author">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">published at</label>
			    <input type="date" class="form-control" required id="published_at" placeholder="Enter published at">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">image url</label>
			    <input type="text" class="form-control" required id="image" placeholder="Enter image url">
			  </div>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary" id="formBtn">Save</button>
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@section('JS')
	<script type="text/javascript">

		$('.addBooksBtn').click(function(){
			$("#booksModal").trigger("reset");
			$('#id').val('');
			$('#exampleModal').modal('show');
		});

		$('.editBtn').click(function(){
			var id = $(this).attr('data-id');
			var name = $(this).attr('data-name');
			var price = $(this).attr('data-price');
			var description = $(this).attr('data-description');
			var author = $(this).attr('data-author');
			var published_at = $(this).attr('data-published_at');
			var image = $(this).attr('data-image');

			published_at = published_at.split(" ")[0];
			
			// reset the form before prefill the data
			$("#booksModal").trigger("reset");

			$('#id').val(id);
			$('#name').val(name);
			$('#price').val(price);
			$('#description').val(description);
			$('#author').val(author);
			$('#published_at').val(published_at);
			$('#image').val(image);
			
			//show the modal
			$('#exampleModal').modal('show');
		});

		$('.delBtn').click(function () {
			var id = $(this).attr('data-id');
			var token = $('meta[name="csrf-token"]').attr('content');

			confirm("Are you sure ?");

			$.ajax({
				'url': 'delete-book',
				'type': 'POST',
				'data': {'id': id},
				'dataType': "json",
				'headers': {
                    'X-CSRF-Token': token 
               	},
				'success': function(resp) {
					if (resp.status == 'success') {
						window.location.reload(1);
					}
				}, 
				'error': function(error) {
					console.log(error);
				}
			});
		})

		$('#formBtn').click(function(){
			var token = $('input[name="_token"]').val();
			var formData = {
				'id': $('#id').val(),
				'name': $('#name').val(),
				'price': $('#price').val(),
				'description': $('#description').val(),
				'author': $('#author').val(),
				'published_at': $('#published_at').val(),
				'image': $('#image').val()
			};

			$.ajax({
				'url': 'books',
				'type': 'POST',
				'data': {'input': formData},
				'dataType': "json",
				'headers': {
                    'X-CSRF-Token': token 
               	},
				'success': function(resp) {
					if (resp.status == 'success') {
						if (resp.type === 'update') {
							window.location.reload(1);
						} else {
							resp = resp.data;
							var tableData = '<tr>'+
										      '<th scope="row"><img src=" ' + resp.image + ' "></th>'+
										      '<td>'+ resp.name +'</td>'+
										      '<td>'+ resp.price +'</td>'+
										      '<td>'+ resp.description +'</td>'+
										      '<td>'+ resp.author +'</td>'+
										      '<td>'+ resp.published_at +'</td>'+
										      '<td><button class="editBtn btn btn-success" '+
										      		'data-id="'+resp.id+'"' +
										      		'data-name="'+resp.name+'"' +
										      		'data-price="'+resp.price+'"' +
										      		'data-description="'+resp.description+'"' +
										      		'data-author="'+resp.author+'"' +
										      		'data-published_at="'+resp.published_at+'"' +
										      		'data-image="'+resp.image+'"' +
										      	'>Edit</button><button class="delBtn btn btn-danger" '+
										      		'data-id="'+resp.id+'"' +
										      	'>Delete</button></td>'+
										    '</tr>';

							$('tbody').append(tableData);
							$('.modal').modal('hide')
						}
					}
				}, 
				'error': function(error) {
					console.log(error);
				}
			});
		});
	</script>
@endsection