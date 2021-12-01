<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\adminModels\PaymentModel as MainModel;
use Session;
class PaymentController extends Controller
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
        return view('admin.paymentView',["data"=>$data]);
    }
    public function delete($id){
        $data = $this->model->deleteItem($id);
        return redirect("admin/product/payment");
    }
    public function paymentDetail($id){
        $data = $this->model->detail($id);
        return view('admin.paymentDetailView',["data"=>$data]);
    }
    public function paymentDelivery($id){
        $this->model->delivery($id);
        return redirect("admin/product/payment");
    }
}