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
                    <h6 class="card-title">Chi tiet zoom</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name: @php
                                    echo $data->name;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Price: @php
                                    echo $data->price;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Hotel id: @php
                                    echo $data->hotel_id;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">image: <br>
                                            <img src="{{ asset('assets/upload/img/'.$data->img) }}" alt="" style="width: 200px; height: 200px;">
                                </label>
                            </div>
                            <a class="btn btn-primary" href="{{ route("admin.zoom.index") }}">Back</a>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection