<?php

namespace App\Models\adminModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
use Validator;
class CarModel extends Model
{
    protected $table = "car_detail";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems(){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("car_detail")->orderBy("id","desc")->paginate(4);
        return $data;
    }
    public function totalRecord(){
        $users = DB::table('car_detail')->get();
        $check = $users->count();
        return $check;
    }
    public function modelCreate(){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $description = Request::get("description");
        $rental_company = Request::get("rental_company");
        $car_type = Request::get("car_type");
        $car_name = Request::get("car_name");
        $baggage = Request::get("baggage");
        $car_features = Request::get("car_features");
        $pick_up_location_details = Request::get("pick_up_location_details");
        $drop_off_location_details = Request::get("drop_off_location_details"); 
        $pick_up_time = Request::get("pick_up_time"); 
        $drop_off_time = Request::get("drop_off_time"); 
        $pick_up_location = Request::get("pick_up_location"); 
        $drop_out_location = Request::get("drop_out_location"); 
        $passengers = Request::get("passengers"); 
        DB::table("car_detail")->insert(["name"=>$name,"price"=>$price,"discount"=>$discount,"hot"=>$hot,"rental_company"=>$rental_company,
        "car_name"=>$car_name,"description"=>$description,"car_type"=>$car_type,"baggage"=>$baggage,
        "car_features"=>$car_features,"pick_up_location_details"=>$pick_up_location_details,"drop_off_location_details"=>$drop_off_location_details,
        "pick_up_time"=>$pick_up_time,"drop_off_time"=>$drop_off_time,"pick_up_location"=>$pick_up_location,
        "drop_out_location"=>$drop_out_location,"passengers"=>$passengers]);     
    }
    public function getRecord($id){
        $data = DB::table('car_detail')->where('id', $id)->first();
        return $data;
    }
    public function modelEdit($id){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $description = Request::get("description");
        $rental_company = Request::get("rental_company");
        $car_type = Request::get("car_type");
        $car_name = Request::get("car_name");
        $baggage = Request::get("baggage");
        $car_features = Request::get("car_features");
        $pick_up_location_details = Request::get("pick_up_location_details");
        $drop_off_location_details = Request::get("drop_off_location_details"); 
        $pick_up_time = Request::get("pick_up_time"); 
        $drop_off_time = Request::get("drop_off_time"); 
        $pick_up_location = Request::get("pick_up_location"); 
        $drop_out_location = Request::get("drop_out_location"); 
        $passengers = Request::get("passengers"); 
        DB::table('car_detail')->where('id', $id)->update(["name"=>$name,"price"=>$price,"discount"=>$discount,"hot"=>$hot,"rental_company"=>$rental_company,
        "car_name"=>$car_name,"description"=>$description,"car_type"=>$car_type,"baggage"=>$baggage,
        "car_features"=>$car_features,"pick_up_location_details"=>$pick_up_location_details,"drop_off_location_details"=>$drop_off_location_details,
        "pick_up_time"=>$pick_up_time,"drop_off_time"=>$drop_off_time,"pick_up_location"=>$pick_up_location,
        "drop_out_location"=>$drop_out_location,"passengers"=>$passengers]);
        // DB::update('update users set name ='. $name. ',email ='. $email. ',password ='. $password. ' where id = ?', [$id]);
    }
    public function getId(){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $description = Request::get("description");
        $rental_company = Request::get("rental_company");
        $car_type = Request::get("car_type");
        $car_name = Request::get("car_name");
        $baggage = Request::get("baggage");
        $car_features = Request::get("car_features");
        $pick_up_location_details = Request::get("pick_up_location_details");
        $drop_off_location_details = Request::get("drop_off_location_details"); 
        $pick_up_time = Request::get("pick_up_time"); 
        $drop_off_time = Request::get("drop_off_time"); 
        $pick_up_location = Request::get("pick_up_location"); 
        $drop_out_location = Request::get("drop_out_location"); 
        $passengers = Request::get("passengers"); 
        $id = DB::table('car_detail')->where([
            ['name', $name],
            ['price', $price],
            ['discount', $discount],
            ['rental_company', $rental_company],
            ['car_type', $car_type],
        ])->first();
        return $id->id;
    }
    public function deleteItem($id){
        DB::table('car_detail')->delete(["id"=>$id]);
        DB::table('car_images')->where('car_id', '=', $id)->delete();
    }
    public function detail($id){
        $data = DB::table('car_detail')->where('id', $id)->first();
        return $data;
    }
    public function getImage($id){
        $image = DB::table('car_images')->where('car_id', $id)->get();;
        return $image;
    }
}