<?php

namespace App\Models\frontendModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
use Validator;
class PaymentModel extends Model
{
    protected $table = "hotel_detail";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems($id){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("hotel_detail")->where('id',$id)->first();
        return $data;
    }
    public function room($room_id,$id){
        $room = DB::table('room_detail')->where('hotel_id',$id)->find($room_id);
        return $room;
    }
    public function modelCreate(){
        $first_name = Request::get("first_name");
        $last_name = Request::get("last_name");
        $gmail = Request::get("gmail");
        $phone = Request::get("phone");
        $address = Request::get("address");
        $country = Request::get("country");
        $country_code = Request::get("country_code");
        $check_time = Request::get("check_time");
        $room_name = Request::get("room_name");
        $rooms = Request::get("rooms");
        $people = Request::get("people");
        $price = Request::get("price");
        $card_name = Request::get("card_name");
        $card_number = Request::get("card_number");
        $exp_month = Request::get("exp_month");
        $exp_year = Request::get("exp_year");
        $cvv = Request::get("cvv");
        $hotel_id = Request::get("hotel_id");
        $status = Request::get("status");
        DB::table("payment_detail")->insert(["first_name"=>$first_name,"last_name"=>$last_name,"gmail"=>$gmail,"phone"=>$phone,"address"=>$address
        ,"country"=>$country,"country_code"=>$country_code,"check_time"=>$check_time,"room_name"=>$room_name,"rooms"=>$rooms,"people"=>$people
        ,"price"=>$price,"card_name"=>$card_name,"card_number"=>$card_number,"exp_month"=>$exp_month,"exp_year"=>$exp_year,"cvv"=>$cvv,"hotel_id"=>$hotel_id,"status"=>$status]);
    }
}