<?php

namespace App\Models\adminModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
//doi tuong ma hoa password
use Hash;
class UserModel extends Model
{
    protected $table = "users";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems(){
        //phan 4 ban ghi tren mot trang
        $data = DB::table("users")->orderBy("id","desc")->paginate(4);
        return $data;
    }
    public function modelCreate(){
        $name = Request::get("name");
        $email = Request::get("email");
        $password = Request::get("password");
        //ma hoa password
        $password = Hash::make($password);
        $query = DB::table('users')->where('email',$email);
        $check = $query->count();
        if($check == 0){
            DB::table("users")->insert(["name"=>$name,"email"=>$email,"password"=>$password,"level"=>'2']);
            return true;
        }
        else
            return false;
       
    }
    public function deleteItem($id){
        DB::table('users')->delete(["id"=>$id]);
    }
    public function modelEdit($id){
        $name = Request::get("name");
        $email = Request::get("email");
        $password = Request::get("password");
        //ma hoa password
        $password = Hash::make($password);
        DB::table('users')->where('id', $id)->update(['name' => $name,'password' => $password,'email' => $email]);
        // DB::update('update users set name ='. $name. ',email ='. $email. ',password ='. $password. ' where id = ?', [$id]);
    }
    public function getRecord($id){
        $data = DB::table('users')->where('id', $id)->first();
        return $data;
    }
    public function totalRecord(){
        $users = DB::table('users')->get();
        $check = $users->count();
        return $check;
    }
}
