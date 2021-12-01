<?php

namespace App\Http\Controllers\frontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontendModels\HomeModel as HomeModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
class HomeController extends Controller
{
    //
    public $hotel;
    public function __construct(){
		//gan bien $model la mot object cua model User
		$this->home = new HomeModel;
	}
    public function index(){
    	$popHotel = DB::table('hotel_detail')->Where('hot',1)->take(8)->get();
    	//$data = $this->hotel->hotHotel();
    	
    	return view('frontend.index',['popHotel'=>$popHotel]);
    }
    public function success(){
    	$popHotel = DB::table('hotel_detail')->Where('hot',1)->take(8)->get();
    	//$data = $this->hotel->hotHotel();
    	$success =1;
    	return view('frontend.index',['popHotel'=>$popHotel,'success'=>$success]);
    }
    public function loginPost(Request $request) {
        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'password' => 'required|min:6'
        ];
        $messages = [
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
      
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $username = $request->username;
            $password = $request->password;
            $rememberHiden = $request->rememberHiden;
            if( $rememberHiden == "checked"){
                if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
                    // The user is being remembered...
                  // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                  return redirect("");
                } else {
                    // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                    Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                    return redirect('admin/login');
                }
            }else{
                if( Auth::attempt(['username' => $username, 'password' =>$password])) {
                    // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                    return redirect("");
                } else {
                    // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                    Session::flash('error', 'Username hoặc mật khẩu không đúng!');
                    return redirect('');
                }
            }
           
        }
    }

}
