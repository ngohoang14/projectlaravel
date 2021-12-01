<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\adminModels\ReviewModel as MainModel;
use Session;
class ReviewController extends Controller
{
    public $model;
	//ham tao
	public function __construct()
    {
		//gan bien $model la mot object cua model User
		$this->model = new MainModel;
	}
    public function index()
    {
        $data = $this->model->listItems();
        return view('admin.reviewView',["data"=>$data]);
    }
    public function reviewDetail($id)
    {
        $data = $this->model->detail($id);
        return view('admin.reviewDetailView',["data"=>$data]);
    }
  
}