<?php

namespace App\Models\adminModels;

use Illuminate\Database\Eloquent\Model;
//muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong lay cac bien theo kieu GET, POST
use Request;
class ReviewModel extends Model
{
    protected $table = "hotel_detail";
    //neu khong muon fill du lieu vao 2 cot la create_at va update_at thi khai bao cau lenh sau
    public $timestamps = false;
    public function listItems()
    {
        $data = DB::table('rate')
        ->join('hotel_detail', 'hotel_detail.id', '=', 'rate.hotel_id')
        ->select('rate.*', 'hotel_detail.name as hotel_name')
        ->orderBy('id','desc')->paginate(4);
        return $data;
    }
    public function detail($id){
        $data = DB::table('rate')
        ->join('hotel_detail', 'hotel_detail.id', '=', 'rate.hotel_id')
        ->join('hotel_images', 'hotel_images.hotel_id', '=', 'rate.hotel_id')
        ->where('rate.id',$id)
        ->select('rate.*', 'hotel_detail.name as hotel_name','hotel_images.name as img_name')
        ->first();
        return $data;
    }
}