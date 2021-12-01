<?php

namespace App\Models\adminModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
use Validator;
class paymentModel extends Model
{
    protected $table = "payment_detail";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems(){

        //phan 4 ban ghi tren mot trang
        $data = DB::table("payment_detail")->orderBy("id","desc")->join('hotel_detail', 'payment_detail.hotel_id', '=', 'hotel_detail.id')
        ->select('payment_detail.*', 'hotel_detail.name', 'hotel_detail.discount', 'hotel_detail.available_from', 'hotel_detail.available_to')
        ->paginate(4);
        return $data;
    }
    public function totalRecord(){
        $users = DB::table('payment_detail')->get();
        $check = $users->count();
        return $check;
    }
    public function deleteItem($id){
        DB::table('payment_detail')->delete(["id"=>$id]);        
    }
    public function detail($id){
        $data = DB::table('payment_detail')
        ->join('hotel_detail', 'payment_detail.hotel_id', '=', 'hotel_detail.id')
        ->select('payment_detail.*', 'hotel_detail.name', 'hotel_detail.price', 'hotel_detail.discount', 'hotel_detail.available_from', 'hotel_detail.available_to')
        ->where('payment_detail.id', $id)->first();
        return $data;
    }
    public function getHotel($id){
        $data1 = DB::table('hotel_detail')->where('hotel_id', $id)->get();;
        return $data1;
    }
    public function delivery($id){
        DB::table('payment_detail')->where('id', $id)->update(["status"=>"1"]);
    }
}