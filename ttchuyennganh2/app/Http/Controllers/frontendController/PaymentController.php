<?php

namespace App\Http\Controllers\frontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\frontendModels\PaymentModel as MainModel;
use Session;
class PaymentController extends Controller
{
    public $model;
	//ham tao
	public function __construct(){
		//gan bien $model la mot object cua model User
		$this->model = new MainModel;
	}
    public function index($id, $daterange, $rooms, $people, $room_id)
    {
        $data = $this->model->listItems($id);        
        $room = $this->model->room($room_id, $id);
        $price1 = $rooms*($data->price-($data->price*$data->discount)/100);
        return view('frontend.hotel-booking',["data"=>$data,"room"=>$room,"rooms"=>$rooms,"daterange"=>$daterange,"people"=>$people,"price1"=>$price1]);

    }
    public function index2($id)
    {
        return view('frontend.index');
    }
    public function create(){
        $this->model->modelCreate();
        return redirect('/success');
    }
}