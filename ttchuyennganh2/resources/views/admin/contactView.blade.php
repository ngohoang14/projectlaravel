<!-- load file layout chung -->
@extends('admin.layout')
@section('content')
@if ($errors->any())
	<div class="alert alert-danger alert-dismissible" role="alert">
		<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

	</div>
@endif
    <div class="col-md-12">
        <style type="text/css">
            .pagination{padding:0px; margin:0px; float: right;}
        </style>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">information website</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>logo</th>
                                    <th>phone</th> 
                                    <th>email</th>
                                    <th style="width: 150px;"></th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($infors as $infor): ?>
                                <tr>
                                    <th><?php echo $infor->id; ?></th>
                                    <th><?php echo $infor->name; ?></th>
                                    <th><img src="{{ asset('assets/upload/img/'.$infor->logo) }}" alt="" style="width: 100px; height: 100px;"></th>
                                    <th><?php echo $infor->phone; ?></th>
                                    <th><?php echo $infor->email; ?></th>
                                    <th style="text-align:center;">
                                        <a class="btn btn-success" href="{{ route("admin.information.edit") }}">EDIT</a>&nbsp;
                                    </th>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection