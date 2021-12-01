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
                    <div style=" float: right;">
                        <a href="{{ route("admin.hotel.create") }}" class="btn btn-primary"><h6>ADD Hotel&nbsp <i class="link-icon" data-feather="user-plus"></i></h6></a>
                    </div>
                    <h6 class="card-title">Danh sách hotels</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>discount</th> 
                                    <th>hot</th>
                                    <th>avaliable form</th>
                                    <th>avaliable to</th>
                                    {{-- <th>image</th> --}}
                                    {{-- <th>description</th>  
                                    <th>hotel type</th>
                                    <th>extra people</th>
                                    <th>minium stay</th> 
                                    <th>city</th>
                                    <th>country</th> --}}
                                    <th></th>
                                    <th style="width: 150px;"></th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row): ?>
                                <tr>
                                    <th><?php echo $row->id; ?></th>
                                    <th><?php echo $row->name; ?></th>
                                    <th><?php echo $row->price; ?></th>
                                    <th><?php echo $row->discount; ?></th>
                                    <th><?php echo $row->hot; ?></th>
                                    <th><?php echo $row->available_from; ?></th>
                                    <th><?php echo $row->available_to; ?></th>
                                    <th><a href="{{ route("admin.hotel.hotelDetail", ["id"=>$row->id]) }}" style="text-decoration: underline;">more detail</a></th>
                                    <th style="text-align:center;">
                            <a class="btn btn-success" href="{{ route("admin.hotel.edit", ["id"=>$row->id]) }}">EDIT</a>&nbsp;
                            <a class="btn btn-danger" href="{{ route("admin.hotel.delete", ["id"=>$row->id]) }}" onclick="return window.confirm('Ban co thuc su muon xoa');">DELETE</a>
                                    </th>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example" style="margin-top: 30px">
                            <ul class="pagination">
                                <li>{{ $data->onEachSide(1)->links() }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection