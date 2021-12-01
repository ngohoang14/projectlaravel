
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
			<h6 class="card-title">ADD/EDIT HOTEL</h6>
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
					<label for="exampleInputUsername1">Discount(%)</label>
					<input type="number" value="<?php echo isset($record->discount) ? $record->discount : old('discount') ; ?>" name="discount" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="exampleInputUsername1">Hot</label>
					<input type="checkbox" style="margin-left: 10px;margin-top:0px; width: 20px; height: 20px;" id="check_hot" onclick="check()">
                    <input type="hiden" id="value_hot" value="<?php echo  isset($record->hot) ? $record->hot : 0 ; ?>" style="display: none">
					  <script>
						  var x = document.getElementById("value_hot").value;
						  if(x==1){
							  document.getElementById("check_hot").checked = true;
						  }
					  </script>
					<input type="hidden" name="hot" id="hot" value="<?php echo  isset($record->hot) ? $record->hot : 0 ; ?>">
                    <script type="text/javascript">
                        function check(){
                          var g = document.getElementById("check_hot").checked;
                            if(g == true){
                           document.getElementById("hot").value = "1";
                          }
                            else{
                              document.getElementById("hot").value = "0";
                          }
                        }
                     </script>
					  
				</div>
				
                <div class="form-group">
					<label for="exampleInputUsername1">Avaliable form</label>
					<input type="date" value="<?php echo isset($record->available_from) ? $record->available_from: old('available_from') ; ?>" name="available_from" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="exampleInputUsername1">Avaliable to</label>
					<input type="date" value="<?php echo isset($record->available_to) ? $record->available_to: old('available_to') ; ?>" name="available_to" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="exampleInputUsername1">Description</label>
					<textarea name="description" class="ckeditor" id="Description" required><?php echo isset($record->description) ? $record->description: old('description') ; ?></textarea>
				</div>
				
                <div class="form-group">
					<label for="exampleInputUsername1">Hotel type</label>
					<input type="text" value="<?php echo isset($record->hotel_type) ? $record->hotel_type: old('hotel_type') ; ?>" name="hotel_type" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="exampleInputUsername1">Extra people</label>
					<input type="number" value="<?php echo isset($record->extra_people) ? $record->extra_people: old('extra_people') ; ?>" name="extra_people" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="exampleInputUsername1">Minium stay</label>
					<input type="number" value="<?php echo isset($record->minium_stay) ? $record->minium_stay: old('minium_stay') ; ?>" name="minium_stay" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="exampleInputUsername1">City</label>
					<input type="text" value="<?php echo isset($record->city) ? $record->city: old('city') ; ?>" name="city" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="exampleInputUsername1">Country</label>
					<input type="text" value="<?php echo isset($record->country) ? $record->country: old('country') ; ?>" name="country" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="exampleInputUsername1">Images</label>
					<input type="file" name="image[]" class="form-control" style="margin-bottom: 20px;" multiple>
					@isset($image)
					<?php foreach ($image as $row): ?>
						<img src="{{ asset('assets/upload/img/'.$row->name) }}" alt="" style="width: 200px; height: 200px;">
					<?php endforeach; ?>
					@endisset
				</div>
				<input type="submit" value="Process" class="btn btn-primary">
				<a class="btn btn-light" href="{{ route("admin.hotel.index") }}">Cancel</a>
			</form>
		</div>
	</div>
</div>

@endsection