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
                    <h6 class="card-title">Danh sách đơn hàng</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr> 
                                    <th>Name</th>
                                    <th>Hotel Name</th>
                                    <th>Price</th>                                     
                                    <th>Check in-out</th>                                     
                                    <th>Status</th>                               
                                    <th></th>
                                    <th style="width: 150px;"></th>  
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($data as $row): ?>
                                <tr>
                                    <th><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></th>
                                    <th><?php echo $row->name; ?></th>
                                    <th><?php echo $row->price; ?></th>
                                    <th><?php echo $row->check_time; ?></th>                                                                       
                                    <th><?php if($row->status == 1): ?>
                                        <span class="btn btn-success">Accepted</span>
                                     <?php else: ?>
                                        <span class="btn btn-dark">Pending Request</span>
                                     <?php endif; ?></th>
                                    <th><a href="{{ route("admin.payment.paymentDetail", ["id"=>$row->id]) }}" style="text-decoration: underline;">Detail</a></th>
                                    <th style="text-align:center;">
                            <a class="btn btn-success" href="{{ route("admin.payment.paymentDelivery", ["id"=>$row->id]) }}">Accept</a>&nbsp;
                            <a class="btn btn-danger" href="{{ route("admin.payment.delete", ["id"=>$row->id]) }}" onclick="return window.confirm('Are you sure ?');">Cancel</a>
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