<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\adminModels\UserModel as MainModel;
use Session;
class UserController extends Controller
{
    public $model;
	//ham tao
	public function __construct(){
		//gan bien $model la mot object cuar model User
		$this->model = new MainModel;
	}
    public function index()
    {
        $data = $this->model->listItems();
        return view('admin.userView',["data"=>$data]);
    }
    public function create(){
        return view('admin.userFormView');
    }
    public function createPost(){
    	//goi ham create ban ghi
    	//di chuyen den url: /admin/users/read
        if($this->model->modelCreate())
            //di chuyen den url
            return redirect("admin/users");
        else{
            Session::flash("error","email da ton tai");
            return redirect("admin/users/addUser")->withInput();
        }
    }
    public function edit($id){
        $record = $this->model->getRecord($id);
        return view('admin.userFormView',['record'=>$record]);
    }
    public function editPost($id){
    	//goi ham create ban ghi
    	$this->model->modelEdit($id);
    	//di chuyen den url: /admin/users/read
    	return redirect("admin/users");
    }
    public function delete($id){
        $data = $this->model->deleteItem($id);
        return redirect("admin/users");
    }
}