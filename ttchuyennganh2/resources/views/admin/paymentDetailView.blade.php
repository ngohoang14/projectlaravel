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
            <h6 class="card-title">Payment Infomation</h6>
        <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th style="width: 100px;">ID</th>
                <td>@php
                    echo $data->id;
                @endphp</td>
            </tr>
            <tr>
                <td colspan="2"><h3>Person Info</h3></td>
            <tr>
            <tr>
                <th style="width: 100px;">Name</th>
                <td>@php
                    echo $data->first_name;echo(' '); echo $data->last_name;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Email</th>
                <td>@php
                    echo $data->gmail;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Phone</th>
                <td>@php
                    echo $data->phone;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Address</th>
                <td>@php
                    echo $data->address;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Country</th>
                <td>@php
                    echo $data->country;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Country Code</th>
                <td>@php
                    echo $data->country_code;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Card Name</th>
                <td>@php
                    echo $data->card_name;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Card Number</th>
                <td>@php
                    echo $data->card_number;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Expiry Month</th>
                <td>@php
                    echo $data->exp_month;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Expiry Year</th>
                <td>@php
                    echo $data->exp_year;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">CVV</th>
                <td>@php
                    echo $data->cvv;
                @endphp</td>
            </tr>

            <tr>
                <td colspan="2"><h3>Hotel Info</h3></td>
            <tr>
            <tr>
                <th style="width: 100px;">Hotel Name</th>
                <td>@php
                    echo $data->name;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Rooms</th>
                <td>@php
                    echo $data->rooms;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">People</th>
                <td>@php
                    echo $data->people;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Price</th>
                <td>@php
                    echo $data->price;
                @endphp</td>
            </tr>
            <tr>
                <th style="width: 100px;">Check in</th>
                <td>@php
                    echo $data->check_time;
                @endphp</td>
            </tr>
            <tr>
                <th>
            <a class="btn btn-primary" href="{{ route("admin.payment.index") }}">Back</a>
                </th>
                <td></td>
            </tr>
        </table>
       </div>
    </div>
    </div>
</div>
 @endsection