<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\adminModels\ZoomModel as MainModel;
use Session;
class ZoomController extends Controller
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
        return view('admin.zoomView',["data"=>$data]);
    }
    public function create(){
        return view('admin.zoomFormView');
    }
    public function createPost(Request $request){
    	//goi ham create ban ghi
        
        if($request->hasFile('image')){
            //Hàm kiểm tra dữ liệu
            
            $validator = Validator::make($request->all(), 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],			
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
            if ($validator->fails()) {
                // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
                return redirect('admin/product/zoom/addZoom')->withErrors($validator)->withInput();
            } else {
                 //Lưu hình ảnh vào thư mục public/upload/hinhthe
                
                 $image = $request->file('image');
                 $getImage = time().'_'.$image->getClientOriginalName();
                 $destinationPath = public_path('assets\upload\img');
                 $image->move($destinationPath, $getImage);
                    $this->model->modelCreate($getImage); 
            }
        }
        //di chuyen den url
        return redirect("admin/product/zoom");
    }
    public function edit($id){
        $record = $this->model->getRecord($id);
        $image = $this->model->getImage($id);
        return view('admin.zoomFormView',['record'=>$record,"image"=>$image]);
    }


    // edit
    public function editPost($id,Request $request){
    	//goi ham create ban ghi
        if($request->hasFile('image')){
            //Hàm kiểm tra dữ liệu
            
            $validator = Validator::make($request->all(), 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],			
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
            if ($validator->fails()) {
                // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
                return redirect('admin/product/zoom/editZoom/'.$id)->withErrors($validator)->withInput();
            } else {
                $image = $request->file('image');
                $getImage = time().'_'.$image->getClientOriginalName();
                $destinationPath = public_path('assets\upload\img');
                $image->move($destinationPath, $getImage);
                $this->model->modelEdit($id,$getImage); 
            }
        }else{
             $this->model->modelEdit2($id);
        }
    	//di chuyen den url: /admin/product/zoom
    	return redirect("admin/product/zoom");
    }
    public function delete($id){
        $data = $this->model->deleteItem($id);
        return redirect("admin/product/zoom");
    }
    public function zoomDetail($id){
        $data = $this->model->detail($id);
        $image = $this->model->getImage($id);
        return view('admin.zoomDetailView',["data"=>$data,"image"=>$image]);
    }
}