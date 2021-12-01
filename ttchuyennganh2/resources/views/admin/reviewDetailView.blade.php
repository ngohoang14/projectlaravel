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
                    <h6 class="card-title">Chi tiet hotels</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name: @php
                                    echo $data->name;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Email: @php
                                    echo $data->email;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Star: @php
                                    echo $data->total_star;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Message: @php
                                    echo $data->message;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Hotel name: @php
                                    echo $data->hotel_name;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">image: <br>
                                    <img src="{{ asset('assets/upload/img/'.$data->img_name) }}" alt="" style="width: 200px; height: 200px;">
                                </label>
                            </div>
                            <a class="btn btn-primary" href="{{ route("admin.review.index") }}">Back</a>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection