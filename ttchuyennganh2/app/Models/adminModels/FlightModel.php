<?php

namespace App\Models\adminModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
use Validator;
class FlightModel extends Model
{
    protected $table = "flight_detail";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems(){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("flight_detail")->orderBy("id","desc")->paginate(4);
        return $data;
    }
    public function totalRecord(){
        $users = DB::table('flight_detail')->get();
        $check = $users->count();
        return $check;
    }
    public function modelCreate(){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $description = Request::get("description");
        $airline = Request::get("airline");
        $flight_type = Request::get("flight_type");
        $fare_type = Request::get("fare_type");
        $cancellation = Request::get("cancellation");
        $flight_change = Request::get("flight_change");
        $seats_baggage = Request::get("seats_baggage");
        $inflight_feature = Request::get("inflight_feature"); 
        $base_fare = Request::get("base_fare"); 
        $taxes_fees = Request::get("taxes_fees"); 
        DB::table("flight_detail")->insert(["name"=>$name,"price"=>$price,"discount"=>$discount,"hot"=>$hot,"airline"=>$airline,
        "fare_type"=>$fare_type,"description"=>$description,"flight_type"=>$flight_type,"cancellation"=>$cancellation,
        "flight_change"=>$flight_change,"seats_baggage"=>$seats_baggage,"base_fare"=>$base_fare,
        "inflight_feature"=>$inflight_feature,"taxes_fees"=>$taxes_fees,]);     
    }
    public function getRecord($id){
        $data = DB::table('flight_detail')->where('id', $id)->first();
        return $data;
    }
    public function modelEdit($id){
        $name = Request::get("name");
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $description = Request::get("description");
        $airline = Request::get("airline");
        $flight_type = Request::get("flight_type");
        $fare_type = Request::get("fare_type");
        $cancellation = Request::get("cancellation");
        $flight_change = Request::get("flight_change");
        $seats_baggage = Request::get("seats_baggage");
        $inflight_feature = Request::get("inflight_feature"); 
        $base_fare = Request::get("base_fare"); 
        $taxes_fees = Request::get("taxes_fees"); 
        DB::table('flight_detail')->where('id', $id)->update(["name"=>$name,"price"=>$price,"discount"=>$discount,"hot"=>$hot,"airline"=>$airline,
        "fare_type"=>$fare_type,"description"=>$description,"flight_type"=>$flight_type,"cancellation"=>$cancellation,
        "flight_change"=>$flight_change,"seats_baggage"=>$seats_baggage,"base_fare"=>$base_fare,
        "inflight_feature"=>$inflight_feature,"taxes_fees"=>$taxes_fees,]);
        // DB::update('update users set name ='. $name. ',email ='. $email. ',password ='. $password. ' where id = ?', [$id]);
    }
    public function getId(){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $description = Request::get("description");
        $airline = Request::get("airline");
        $flight_type = Request::get("flight_type");
        $fare_type = Request::get("fare_type");
        $cancellation = Request::get("cancellation");
        $flight_change = Request::get("flight_change");
        $seats_baggage = Request::get("seats_baggage");
        $inflight_feature = Request::get("inflight_feature"); 
        $base_fare = Request::get("base_fare"); 
        $taxes_fees = Request::get("taxes_fees"); 
        $id = DB::table('flight_detail')->where([
            ['name', $name],
            ['price', $price],
            ['discount', $discount],
            ['airline', $airline],
            ['flight_type', $flight_type],
        ])->first();
        return $id->id;
    }
    public function deleteItem($id){
        DB::table('flight_detail')->delete(["id"=>$id]);
        DB::table('flight_images')->where('flight_id', '=', $id)->delete();
    }
    public function detail($id){
        $data = DB::table('flight_detail')->where('id', $id)->first();
        return $data;
    }
    public function getImage($id){
        $image = DB::table('flight_images')->where('flight_id', $id)->get();;
        return $image;
    }
}