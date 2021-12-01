<?php

namespace App\Http\Controllers\frontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\frontendModels\SearchModel as MainModel;
use Session;
class SearchController extends Controller
{
    public $model;
	//ham tao
	public function __construct(){
		//gan bien $model la mot object cua model User
		$this->model = new MainModel;
	}
    public function index()
    {
        $data = $this->model->listItems();
        $count = $this->model->count();
        return view('frontend.hotel-list',["data"=>$data,"count"=>$count]);
    }
    public function sortByDefault(){
        $data = $this->model->listItems();
        foreach($data as $rows){
            $a = $rows->price-($rows->price*$rows->discount)/100;
            if($rows->hot==1){
                $hot = "hot";
            }else{
                $hot = "";
            }
            echo '<div class="card-item card-item-list">
            <div class="card-img">
                <a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'" class="d-block">
                    <img src="assets/upload/img/'.$rows->img.'" alt="hotel-img">
                </a>
                <span class="badge">'.$hot.' </span>
            </div>
            <div class="card-body">
                <h3 class="card-title"><a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'">'.$rows->name.'</a></h3>
                <p class="card-meta">
                    '.$rows->city.', '.$rows->country.'
                </p>
                <div class="card-rating">
                    <span class="badge text-white">4.4/5</span>
                    <span class="review__text">Average</span>
                    <span class="rating__text">(30 Reviews)</span>
                </div>
                <div class="card-price d-flex align-items-center justify-content-between">
                    <p>
                        <span class="price__from">From</span>
                        <span class="price__num">
                            $'.$a.'</span>
                        <span class="price__text">Per night</span>
                    </p>
                    <a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'" class="btn-text">See details<i class="la la-angle-right"></i></a>
                </div>
            </div>
        </div>';
        }
    }
    public function sortByPriceHighToLow()
    {
        $data = $this->model->listItems_priceHightToLow();
        foreach($data as $rows){
            $a = $rows->price-($rows->price*$rows->discount)/100;
            if($rows->hot==1){
                $hot = "hot";
            }
            echo '<div class="card-item card-item-list">
            <div class="card-img">
                <a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'" class="d-block">
                    <img src="assets/upload/img/'.$rows->img.'" alt="hotel-img">
                </a>
                <span class="badge">'.$hot.' </span>
            </div>
            <div class="card-body">
                <h3 class="card-title"><a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'">'.$rows->name.'</a></h3>
                <p class="card-meta">
                    '.$rows->city.', '.$rows->country.'
                </p>
                <div class="card-rating">
                    <span class="badge text-white">4.4/5</span>
                    <span class="review__text">Average</span>
                    <span class="rating__text">(30 Reviews)</span>
                </div>
                <div class="card-price d-flex align-items-center justify-content-between">
                    <p>
                        <span class="price__from">From</span>
                        <span class="price__num">
                            $'.$a.'</span>
                        <span class="price__text">Per night</span>
                    </p>
                    <a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'" class="btn-text">See details<i class="la la-angle-right"></i></a>
                </div>
            </div>
        </div>';
        }
    }
    public function sortByPriceLowToHigh()
    {
        $data = $this->model->listItems_priceLowToHigh();
        foreach($data as $rows){
            $a = $rows->price-($rows->price*$rows->discount)/100;
            if($rows->hot==1){
                $hot = "hot";
            }else{
                $hot = "";
            }
            echo '<div class="card-item card-item-list">
            <div class="card-img">
                <a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'" class="d-block">
                    <img src="assets/upload/img/'.$rows->img.'" alt="hotel-img">
                </a>
                <span class="badge">'.$hot.' </span>
            </div>
            <div class="card-body">
                <h3 class="card-title"><a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'">'.$rows->name.'</a></h3>
                <p class="card-meta">
                    '.$rows->city.', '.$rows->country.'
                </p>
                <div class="card-rating">
                    <span class="badge text-white">4.4/5</span>
                    <span class="review__text">Average</span>
                    <span class="rating__text">(30 Reviews)</span>
                </div>
                <div class="card-price d-flex align-items-center justify-content-between">
                    <p>
                        <span class="price__from">From</span>
                        <span class="price__num">
                            $'.$a.'</span>
                        <span class="price__text">Per night</span>
                    </p>
                    <a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'" class="btn-text">See details<i class="la la-angle-right"></i></a>
                </div>
            </div>
        </div>';
        }
    }
    public function sortByName()
    {
        $data = $this->model->listItems_name();
        foreach($data as $rows){
            $a = $rows->price-($rows->price*$rows->discount)/100;
            if($rows->hot==1){
                $hot = "hot";
            }else{
                $hot = "";
            }
            echo '<div class="card-item card-item-list">
            <div class="card-img">
                <a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'" class="d-block">
                    <img src="assets/upload/img/'.$rows->img.'" alt="hotel-img">
                </a>
                <span class="badge">'.$hot.' </span>
            </div>
            <div class="card-body">
                <h3 class="card-title"><a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'">'.$rows->name.'</a></h3>
                <p class="card-meta">
                    '.$rows->city.', '.$rows->country.'
                </p>
                <div class="card-rating">
                    <span class="badge text-white">4.4/5</span>
                    <span class="review__text">Average</span>
                    <span class="rating__text">(30 Reviews)</span>
                </div>
                <div class="card-price d-flex align-items-center justify-content-between">
                    <p>
                        <span class="price__from">From</span>
                        <span class="price__num">
                            $'.$a.'</span>
                        <span class="price__text">Per night</span>
                    </p>
                    <a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'" class="btn-text">See details<i class="la la-angle-right"></i></a>
                </div>
            </div>
        </div>';
        }
    }
    public function filterByPrice($price){
        $data = $this->model->listItems_filterPrice($price);
        foreach($data as $rows){
            $a = $rows->price-($rows->price*$rows->discount)/100;
            if($rows->hot==1){
                $hot = "hot";
            }else{
                $hot = "";
            }
            echo '<div class="card-item card-item-list">
            <div class="card-img">
                <a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'" class="d-block">
                    <img src="assets/upload/img/'.$rows->img.'" alt="hotel-img">
                </a>
                <span class="badge">'.$hot.' </span>
            </div>
            <div class="card-body">
                <h3 class="card-title"><a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'">'.$rows->name.'</a></h3>
                <p class="card-meta">
                    '.$rows->city.', '.$rows->country.'
                </p>
                <div class="card-rating">
                    <span class="badge text-white">4.4/5</span>
                    <span class="review__text">Average</span>
                    <span class="rating__text">(30 Reviews)</span>
                </div>
                <div class="card-price d-flex align-items-center justify-content-between">
                    <p>
                        <span class="price__from">From</span>
                        <span class="price__num">
                            $'.$a.'</span>
                        <span class="price__text">Per night</span>
                    </p>
                    <a href="'.route("hotelDetail.index", ["id"=>$rows->id]).'" class="btn-text">See details<i class="la la-angle-right"></i></a>
                </div>
            </div>
        </div>';
        }
    }
    public function searchHotel(Request $request){
        $data = $this->model->listItems_searchHotel();
        $count = $this->model->count_searchHotel();
        $daterange = $request->daterange;
        $qtyInput = $request->qtyInput;
        $qtyInput2 = $request->qtyInput2;
        $people = $qtyInput + ($qtyInput2)/2;
        $Destination = $request->Destination;
        return view('frontend.hotel-list',["data"=>$data,"count"=>$count,"daterange"=>$daterange,"qtyInput"=>$qtyInput,"qtyInput2"=>$qtyInput2,"Destination"=>$Destination]);
    }
}