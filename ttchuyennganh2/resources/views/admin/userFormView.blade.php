
@extends('admin.layout')
@section('content')

<div class="col-md-12">
		@if ( Session::has('error') )  
			<div class="alert alert-warning">{{ Session::get('error') }}</div>
		@endif	
		<script></script>
		<div class="card">
		<div class="card-body">
			<h6 class="card-title">ADD/EDIT USER</h6>
			<form class="forms-sample" method="post" action="">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="exampleInputUsername1">Username</label>
					<input type="text" value="<?php echo isset($record->name) ? $record->name: old('name') ; ?>" name="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" value="<?php echo isset($record->email) ? $record->email: old('email') ; ?>" name="email"  class="form-control" >
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" value="<?php echo isset($record->password) ? $record->password: ""; ?>" class="form-control" >
				</div>
				<input type="submit" value="Process" class="btn btn-primary">
				<a class="btn btn-light" href="{{ route("admin.users.index") }}">Cancel</a>
			</form>
		</div>
	</div>
</div>
@endsection