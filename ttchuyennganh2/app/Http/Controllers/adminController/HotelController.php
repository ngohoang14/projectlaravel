<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\adminModels\HotelModel as MainModel;
use Session;
class HotelController extends Controller
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
        return view('admin.hotelView',["data"=>$data]);
    }
    public function create(){
        return view('admin.hotelFormView');
    }
    public function createPost(Request $request){
    	//goi ham create ban ghi
        
        if($request->hasFile('image')){
            //Hàm kiểm tra dữ liệu
            
            $validator = Validator::make($request->all(), 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'image[]' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],			
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'image[].mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'image[].max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
            if ($validator->fails()) {
                // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
                return redirect('admin/product/hotel/addHotel')->withErrors($validator)->withInput();
            } else {
                 //Lưu hình ảnh vào thư mục public/upload/hinhthe
                 $this->model->modelCreate();
                $getId = $this->model->getId(); 
                $i=0; 
                foreach($request->file('image') as $image)
                {   
                    $i++;
                    $getImage = time().'_'.$image->getClientOriginalName();
                    if($i==1){
                        $this->model->getId2($getImage);
                    }
                    $destinationPath = public_path('assets\upload\img');
                    $image->move($destinationPath, $getImage);
                    $insertImages = DB::insert('insert into hotel_images (name,hotel_id) values (?,?)', [$getImage,$getId]);
                } 
            }
        }
        //di chuyen den url
        return redirect("admin/product/hotel");
    }
    public function edit($id){
        $record = $this->model->getRecord($id);
        $image = $this->model->getImage($id);
        return view('admin.hotelFormView',['record'=>$record,"image"=>$image]);
    }


    // edit
    public function editPost($id,Request $request){
    	//goi ham create ban ghi
        if($request->hasFile('image')){
            //Hàm kiểm tra dữ liệu
            
            $validator = Validator::make($request->all(), 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'image[]' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],			
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'image[].mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'image[].max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
            if ($validator->fails()) {
                // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
                return redirect('admin/product/hotel/editHotel/'.$id)->withErrors($validator)->withInput();
            } else {
                $this->model->modelEdit($id);
                DB::table('hotel_images')->where('hotel_id', $id)->delete();
                $i=0;
                foreach($request->file('image') as $image)
                { 
                    $i++;
                    $getImage = time().'_'.$image->getClientOriginalName();
                    if($i==1){
                        $this->model->getId2($getImage);
                    }
                    $destinationPath = public_path('assets\upload\img');
                    $image->move($destinationPath, $getImage);
                    DB::table('hotel_images')->insert([
                        'hotel_id' => $id,
                        'name' => $getImage
                    ]);
                }

           }
        }else{
            $this->model->modelEdit($id);
        }
       
    	//di chuyen den url: /admin/product/hotel
    	return redirect("admin/product/hotel");
    }
    public function delete($id){
        $data = $this->model->deleteItem($id);
        return redirect("admin/product/hotel");
    }
    public function hotelDetail($id){
        $data = $this->model->detail($id);
        $image = $this->model->getImage($id);
        return view('admin.hotelDetalView',["data"=>$data,"image"=>$image]);
    }
}