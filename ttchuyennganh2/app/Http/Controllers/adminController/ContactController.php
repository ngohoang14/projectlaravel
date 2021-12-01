<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\adminModels\ContactModel as MainModel;
use Session;
class ContactController extends Controller
{
    public $model;
	//ham tao
	public function __construct(){
		//gan bien $model la mot object cua model User
		$this->model = new MainModel;
	}
}