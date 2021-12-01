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
                                <label for="exampleInputUsername1">Price: @php
                                    echo $data->price;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Discount: @php
                                    echo $data->discount;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label id="hot_check" >Hot:</label>
                            </div>
                            <input type="hiden" id="value_hot" value="<?php echo $data->hot; ?>" style="display: none">
                            <script>
                                var x = document.getElementById("value_hot").value;
                                if(x==1){
                                    document.getElementById("hot_check").innerHTML = "Hot: Yes";
                                }else{
                                    document.getElementById("hot_check").innerHTML = "Hot: No";
                                }
                            </script>
                            <div class="form-group">
                                <label for="exampleInputUsername1">available_from: @php
                                    echo $data->available_from;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">available_to: @php
                                    echo $data->available_to;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">description: @php
                                    echo $data->description;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">hotel_type: @php
                                    echo $data->hotel_type;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">extra_people: @php
                                    echo $data->extra_people;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">minium_stay: @php
                                    echo $data->minium_stay;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">city: @php
                                    echo $data->city;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">country: @php
                                    echo $data->country;
                                @endphp</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">image: <br>
                                    <?php foreach ($image as $row): ?>
                                            <img src="{{ asset('assets/upload/img/'.$row->name) }}" alt="" style="width: 200px; height: 200px;">
                                    <?php endforeach; ?>
                                    
                                </label>
                            </div>
                            <a class="btn btn-primary" href="{{ route("admin.hotel.index") }}">Back</a>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection