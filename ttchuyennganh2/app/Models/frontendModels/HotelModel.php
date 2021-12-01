<?php

namespace App\Models\frontendModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
class HotelModel extends Model
{
    protected $table = "hotel_detail";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems($id){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("hotel_detail")->where('id',$id)->first();
        return $data;
    }
    public function getImages($id){
        $getImages = DB::table("hotel_images")->where('hotel_id',$id)->get();
        return $getImages;
    }
    public function suggest($id){
        //phan 4 ban ghi tren mot trang
        $suggest = DB::table("hotel_detail")->where('id','!=',$id)->paginate(3);
        return $suggest;
    }
    public function room($id){
        $room = DB::table('room_detail')->where('hotel_id',$id)->get();
        return $room;
    }
    public function rate($id){
        $room = DB::table('rate')->where('hotel_id',$id)->get();
        return $room;
    }
    public function avgRate($id){
        $avgRate = DB::table('rate')->where('hotel_id',$id)->avg('total_star');
        return $avgRate;
    }
    public function rating($id){
        $name = Request::get("name");
        $email = session('userName');
        $message = Request::get("message");
        $star = Request::get("star");
        $checkEmail = DB::table('rate')->where('email',$email)->first();
        if(!empty($checkEmail)){
            DB::table('rate')->where('email',$email)->where("hotel_id",$id)->delete();
        }
        $rate = DB::table('rate')->insert(["name"=>$name,"email"=>$email,"message"=>$message,"total_star"=>$star,"hotel_id"=>$id]);
    }
}