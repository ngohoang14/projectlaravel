<!-- load file layout chung -->
@extends('admin.layout')
@section('content')
    <div class="col-md-12">
        <style type="text/css">
            .pagination{padding:0px; margin:0px; float: right;}
        </style>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Danh sách users</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>STAR</th>
                                    <th>Hotel name</th>
                                    <th style="width: 150px;"></th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row): ?>
                                <tr>
                                    <th><?php echo $row->id; ?></th>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->total_star; ?></td>
                                    <td><?php echo $row->hotel_name; ?></td>
                                    <th><a href="{{ route("admin.review.reviewDetail", ["id"=>$row->id]) }}" style="text-decoration: underline;">more detail</a></th>
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