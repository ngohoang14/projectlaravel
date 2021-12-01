<?php

namespace App\Models\adminModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
use Validator;
class ContactModel extends Model
{
    protected $table = "contact_infor";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems(){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("contact_infor")->first();
        return $data;
    }
    public function totalRecord(){
        $users = DB::table('hotel_detail')->get();
        $check = $users->count();
        return $check;
    }
    public function modelCreate(){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $available_from = Request::get("available_from");
        $available_to = Request::get("available_to");
        $description = Request::get("description");
        $hotel_type = Request::get("hotel_type");
        $extra_people = Request::get("extra_people");
        $minium_stay = Request::get("minium_stay");
        $city = Request::get("city");
        $country = Request::get("country"); 
        $img = "aaa";  
        DB::table("hotel_detail")->insert(["name"=>$name,"price"=>$price,"discount"=>$discount,"hot"=>$hot,"available_from"=>$available_from,
        "available_to"=>$available_to,"description"=>$description,"hotel_type"=>$hotel_type,"extra_people"=>$extra_people,
        "minium_stay"=>$minium_stay,"city"=>$city,"country"=>$country,"img"=>$img]);
        
    }
    public function getId2($image){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $city = Request::get("city");
        $hotel_type = Request::get("hotel_type");
        $id = DB::table('hotel_detail')->where([
            ['name', $name],
            ['price', $price],
            ['discount', $discount],
            ['city', $city],
            ['hotel_type', $hotel_type],
        ])->update(["img"=>$image]);
    }
    public function getRecord(){
        $data = DB::table('hotel_detail')->first();
        return $data;
    }
    public function modelEdit($id){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $available_from = Request::get("available_from");
        $available_to = Request::get("available_to");
        $description = Request::get("description");
        $hotel_type = Request::get("hotel_type");
        $extra_people = Request::get("extra_people");
        $minium_stay = Request::get("minium_stay");
        $city = Request::get("city");
        $country = Request::get("country"); 
        $img = Request::get("image"); 
        DB::table('hotel_detail')->where('id', $id)->update(["name"=>$name,"price"=>$price,"discount"=>$discount,"hot"=>$hot,"available_from"=>$available_from,
        "available_to"=>$available_to,"description"=>$description,"hotel_type"=>$hotel_type,"extra_people"=>$extra_people,
        "minium_stay"=>$minium_stay,"city"=>$city,"country"=>$country]);
        // DB::update('update users set name ='. $name. ',email ='. $email. ',password ='. $password. ' where id = ?', [$id]);
    }
    public function getId(){
        $name = Request::get("name");
        $price = Request::get("price");
        $discount = Request::get("discount");
        $hot = Request::get("hot");
        $available_from = Request::get("available_from");
        $available_to = Request::get("available_to");
        $description = Request::get("description");
        $hotel_type = Request::get("hotel_type");
        $extra_people = Request::get("extra_people");
        $minium_stay = Request::get("minium_stay");
        $city = Request::get("city");
        $country = Request::get("country");  
        $id = DB::table('hotel_detail')->where([
            ['name', $name],
            ['price', $price],
            ['discount', $discount],
            ['city', $city],
            ['hotel_type', $hotel_type],
        ])->first();
        return $id->id;
    }
    public function deleteItem($id){
        DB::table('hotel_detail')->delete(["id"=>$id]);
        DB::table('hotel_images')->where('hotel_id', '=', $id)->delete();
    }
    public function detail($id){
        $data = DB::table('hotel_detail')->where('id', $id)->first();
        return $data;
    }
    public function getImage($id){
        $image = DB::table('hotel_images')->where('hotel_id', $id)->get();;
        return $image;
    }
}