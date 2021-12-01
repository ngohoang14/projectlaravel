<?php

namespace App\Models\adminModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
use Validator;
class CruiseModel extends Model
{
    protected $table = "cruise_detail";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems(){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("cruise_detail")->orderBy("id","desc")->paginate(4);
        return $data;
    }
    public function totalRecord(){
        $users = DB::table('cruise_detail')->get();
        $check = $users->count();
        return $check;
    }
    public function modelCreate(){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $description = Request::get("description");
        $date_launched = Request::get("date_launched");
        $age_of_ship = Request::get("age_of_ship");
        $refurbished_date = Request::get("refurbished_date");
        $tonnage = Request::get("tonnage");
        $length = Request::get("length");
        $beam = Request::get("beam");
        $draft = Request::get("draft"); 
        $speed = Request::get("speed"); 
        $guest_capacity = Request::get("guest_capacity"); 
        $total_staff = Request::get("total_staff"); 
        $officers = Request::get("officers"); 
        $dining_crew = Request::get("dining_crew"); 
        $other_crew = Request::get("other_crew"); 
        $registry = Request::get("registry"); 
        $ship_type = Request::get("ship_type"); 
        DB::table("cruise_detail")->insert(["name"=>$name,"price"=>$price,"discount"=>$discount,"hot"=>$hot,"date_launched"=>$date_launched,
        "age_of_ship"=>$age_of_ship,"description"=>$description,"refurbished_date"=>$refurbished_date,"tonnage"=>$tonnage,
        "length"=>$length,"beam"=>$beam,"draft"=>$draft,
        "speed"=>$speed,"guest_capacity"=>$guest_capacity,"total_staff"=>$total_staff,
        "officers"=>$officers,"dining_crew"=>$dining_crew,"ship_type"=>$ship_type,"other_crew"=>$other_crew,"registry"=>$registry]);     
    }
    public function getRecord($id){
        $data = DB::table('cruise_detail')->where('id', $id)->first();
        return $data;
    }
    public function modelEdit($id){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $description = Request::get("description");
        $date_launched = Request::get("date_launched");
        $age_of_ship = Request::get("age_of_ship");
        $refurbished_date = Request::get("refurbished_date");
        $tonnage = Request::get("tonnage");
        $length = Request::get("length");
        $beam = Request::get("beam");
        $draft = Request::get("draft"); 
        $speed = Request::get("speed"); 
        $guest_capacity = Request::get("guest_capacity"); 
        $total_staff = Request::get("total_staff"); 
        $officers = Request::get("officers"); 
        $dining_crew = Request::get("dining_crew"); 
        $other_crew = Request::get("other_crew"); 
        $registry = Request::get("registry"); 
        $ship_type = Request::get("ship_type"); 
        DB::table('cruise_detail')->where('id', $id)->update(["name"=>$name,"price"=>$price,"discount"=>$discount,"hot"=>$hot,"date_launched"=>$date_launched,
        "age_of_ship"=>$age_of_ship,"description"=>$description,"refurbished_date"=>$refurbished_date,"tonnage"=>$tonnage,
        "length"=>$length,"beam"=>$beam,"draft"=>$draft,
        "speed"=>$speed,"guest_capacity"=>$guest_capacity,"total_staff"=>$total_staff,
        "officers"=>$officers,"dining_crew"=>$dining_crew,"ship_type"=>$ship_type,"other_crew"=>$other_crew,"registry"=>$registry]);
        // DB::update('update users set name ='. $name. ',email ='. $email. ',password ='. $password. ' where id = ?', [$id]);
    }
    public function getId(){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $description = Request::get("description");
        $date_launched = Request::get("date_launched");
        $age_of_ship = Request::get("age_of_ship");
        $refurbished_date = Request::get("refurbished_date");
        $tonnage = Request::get("tonnage");
        $length = Request::get("length");
        $beam = Request::get("beam");
        $draft = Request::get("draft"); 
        $speed = Request::get("speed"); 
        $guest_capacity = Request::get("guest_capacity"); 
        $total_staff = Request::get("total_staff"); 
        $officers = Request::get("officers"); 
        $dining_crew = Request::get("dining_crew"); 
        $other_crew = Request::get("other_crew"); 
        $registry = Request::get("registry"); 
        $ship_type = Request::get("ship_type");  
        $id = DB::table('cruise_detail')->where([
            ['name', $name],
            ['price', $price],
            ['discount', $discount],
            ['officers', $officers],
            ['ship_type', $ship_type],
        ])->first();
        return $id->id;
    }
    public function deleteItem($id){
        DB::table('cruise_detail')->delete(["id"=>$id]);
        DB::table('cruise_images')->where('cruise_id', '=', $id)->delete();
    }
    public function detail($id){
        $data = DB::table('cruise_detail')->where('id', $id)->first();
        return $data;
    }
    public function getImage($id){
        $image = DB::table('cruise_images')->where('cruise_id', $id)->get();;
        return $image;
    }
}