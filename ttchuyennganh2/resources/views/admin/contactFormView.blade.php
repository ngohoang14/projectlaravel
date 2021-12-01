
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
		<div class="card">
		<div class="card-body">
			<h6 class="card-title">EDIT INFOTMATION</h6>
			<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<?php foreach ($records as $record): ?>
				<div class="form-group">
					<label for="exampleInputUsername1">Name</label>
					<input type="text" value="<?php echo isset($record->name) ? $record->name : old('name') ; ?>" name="name" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="exampleInputUsername1">Phone</label>
					<input type="text" value="<?php echo isset($record->phone) ? $record->phone : old('phone') ; ?>" name="phone" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="exampleInputUsername1">Email</label>
					<input type="text" value="<?php echo isset($record->email) ? $record->email : old('email') ; ?>" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="exampleInputUsername1">Logo</label>
					<input type="file" name="logo" class="form-control" style="margin-bottom: 20px;">
					@isset($record->logo)
						<img src="{{ asset('assets/upload/img/'.$record->logo) }}" alt="" style="width: 200px; height: 200px;">
					@endisset
				</div>
				<?php endforeach; ?>
				<input type="submit" value="Process" class="btn btn-primary">
				<a class="btn btn-light" href="{{ route("admin.information.index") }}">Cancel</a>
			</form>
		</div>
	</div>
</div>

@endsection