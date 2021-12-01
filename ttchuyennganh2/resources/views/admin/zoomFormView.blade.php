
@extends('admin.layout')
@section('content')
@if ($errors->any())
	<div class="alert alert-danger alert-dismissible" role="alert">
		<ul style="list-style: none">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
<div class="col-md-12">
		@if ( Session::has('error') )  
			<div class="alert alert-warning">{{ Session::get('error') }}</div>
		@endif	
			
		{{-- <script type="text/javascript">
				Dropzone.options.dropzone =
				 {
					maxFilesize: 12,
					renameFile: function(file) {
						var dt = new Date();
						var time = dt.getTime();
					   return time+file.name;
					},
					acceptedFiles: ".jpeg,.jpg,.png,.gif",
					timeout: 5000,
					success: function(file, response) 
					{
						console.log(response);
					},
					error: function(file, response)
					{
					   return false;
					}
		};
		</script> --}}
		<div class="card">
		<div class="card-body">
			<h6 class="card-title">ADD/EDIT ZOOM</h6>
			<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="exampleInputUsername1">Name</label>
					<input type="text" value="<?php echo isset($record->name) ? $record->name : old('name') ; ?>" name="name" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="exampleInputUsername1">Price</label>
					<input type="number" value="<?php echo isset($record->price) ? $record->price : old('price') ; ?>" name="price" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="exampleInputUsername1">Hotel id</label>
					<input type="number" value="<?php echo isset($record->hotel_id) ? $record->price : old('hotel_id') ; ?>" name="hotel_id" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="exampleInputUsername1">Images</label>
					<input type="file" name="image" class="form-control" style="margin-bottom: 20px;">
					@isset($image)
					<?php foreach ($image as $row): ?>
						<img src="{{ asset('assets/upload/img/'.$row->name) }}" alt="" style="width: 200px; height: 200px;">
					<?php endforeach; ?>
					@endisset
					{{-- @isset(old('image'))
					<img src="{{ asset('assets/upload/img/'.$row->name) }}" alt="" style="width: 200px; height: 200px;">
					@endisset --}}
				</div>
				<input type="submit" value="Process" class="btn btn-primary">
				<a class="btn btn-light" href="{{ route("admin.zoom.index") }}">Cancel</a>
			</form>
			{{-- <form method="post" action="{{url('dropzone-image-upload')}}" enctype="multipart/form-data" 
						  class="dropzone" id="dropzone">
					</form>   --}}
		</div>
	</div>
</div>

@endsection