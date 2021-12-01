<?php

namespace App\Models\frontendModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
use Validator;
class SearchModel extends Model
{
    protected $table = "hotel_detail";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems(){
        $data = DB::table("hotel_detail")->get();
        return $data;
    }
    public function listItems_priceHightToLow(){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("hotel_detail")->orderBy('price','desc')->get();
        return $data;
    }
    public function listItems_priceLowToHigh(){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("hotel_detail")->orderBy('price','asc')->get();
        return $data;
    }
    public function listItems_name(){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("hotel_detail")->orderBy('name','asc')->get();
        return $data;
    }
    public function listItems_filterPrice($price){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("hotel_detail")->where('price','<',$price)->get();
        return $data;
    }
    public function count(){
        $count = DB::table("hotel_detail")->get()->count();
        return $count;
    }
    public function listItems_searchHotel(){
        $daterange = Request::get("daterange");
        $check = explode(" - ", $daterange);
        $check1 = explode("/",$check[0]);
        $b ="";
        $b=$check1[0];
        $check1[0]=$check1[1];
        $check1[1]=$b;
        $check2= explode("/",$check[1]);
        $c ="";
        $c=$check2[0];
        $check2[0]=$check2[1];
        $check2[1]=$c;
        $checkin_string = $check1[0].'/'.$check1[1].'/'.$check1[2];
        $checkout_string = $check2[0].'/'.$check2[1].'/'.$check2[2];
        $checkin_time = strtotime($checkin_string);
        $checkout_time = strtotime($checkout_string);
        $checkin = date('Y-m-d',$checkin_time);
        $checkout = date('Y-m-d',$checkout_time);
        $people = Request::get("qtyInput")+ Request::get("qtyInput2")/2;
        $Destination = Request::get("Destination");
        if($Destination!=null)
       {
        $data = DB::table("hotel_detail")->where("country",$Destination)->where("available_from","<",$checkin)->where("extra_people",">",$people)->where("available_to",">",$checkout)->get();
       }
        else{
            $data = DB::table("hotel_detail")->where("available_from","<",$checkin)->where("extra_people",">",$people)->where("available_to",">",$checkout)->get();
        } 
        
        return $data;
    }
    public function count_searchHotel(){
        $daterange = Request::get("daterange");
        $check = explode(" - ", $daterange);
        $check1 = explode("/",$check[0]);
        $b ="";
        $b=$check1[0];
        $check1[0]=$check1[1];
        $check1[1]=$b;
        $check2= explode("/",$check[1]);
        $c ="";
        $c=$check2[0];
        $check2[0]=$check2[1];
        $check2[1]=$c;
        $checkin_string = $check1[0].'/'.$check1[1].'/'.$check1[2];
        $checkout_string = $check2[0].'/'.$check2[1].'/'.$check2[2];
        $checkin_time = strtotime($checkin_string);
        $checkout_time = strtotime($checkout_string);
        $checkin = date('Y-m-d',$checkin_time);
        $checkout = date('Y-m-m',$checkout_time);
        $people = Request::get("qtyInput")+ Request::get("qtyInput2")/2;
        $Destination = Request::get("Destination");
        if($Destination!=null)
        {
            $count = DB::table("hotel_detail")->where("country",$Destination)->where("available_from","<",$checkin)->where("extra_people",">",$people)->where("available_to",">",$checkout)->get()->count();
        }
         else{
            $count = DB::table("hotel_detail")->where("available_from","<",$checkin)->where("extra_people",">",$people)->where("available_to",">",$checkout)->get()->count();
         } 
       
        return $count;
    }  
}