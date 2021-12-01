<?php

namespace App\Models\adminModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
use Validator;
class ZoomModel extends Model
{
    protected $table = "room_detail";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems(){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("room_detail")->orderBy("id","desc")->paginate(8);
        return $data;
    }
    public function totalRecord(){
        $users = DB::table('room_detail')->get();
        $check = $users->count();
        return $check;
    }
    public function modelCreate($getImage){
        $name = Request::get("name");
        $price = Request::get("price");
        $hotel_id = Request::get("hotel_id");
        DB::table("room_detail")->insert(["name"=>$name,"price"=>$price,"hotel_id"=>$hotel_id,"img"=>$getImage]);
        
    }
    public function getRecord($id){
        $data = DB::table('room_detail')->where('id', $id)->first();
        return $data;
    }
    public function modelEdit($id,$getImage){
        $name = Request::get("name");
        $price = Request::get("price");
        $hotel_id = Request::get("hotel_id");
        DB::table('room_detail')->where('id', $id)->update(["name"=>$name,"price"=>$price,"hotel_id"=>$hotel_id,"img"=>$getImage]);
        // DB::update('update users set name ='. $name. ',email ='. $email. ',password ='. $password. ' where id = ?', [$id]);
    }
    public function modelEdit2($id){
        $name = Request::get("name");
        $price = Request::get("price");
        $hotel_id = Request::get("hotel_id");
        DB::table('room_detail')->where('id', $id)->update(["name"=>$name,"price"=>$price,"hotel_id"=>$hotel_id,]);
        // DB::update('update users set name ='. $name. ',email ='. $email. ',password ='. $password. ' where id = ?', [$id]);
    }
    public function getId(){
        $name = Request::get("name");
        $price = Request::get("price");
        $hotel_id = Request::get("hotel_id");
        $id = DB::table('room_detail')->where([
            ['name', $name],
            ['price', $price],
            ['hotel_id', $hotel_id],
        ])->first();
        return $id->id;
    }
    public function deleteItem($id){
        DB::table('room_detail')->delete(["id"=>$id]);
    }
    public function detail($id){
        $data = DB::table('room_detail')->where('id', $id)->first();
        return $data;
    }
    public function getImage($id){
        $image = DB::table('room_detail')->where('id', $id)->get();;
        return $image;
    }
}