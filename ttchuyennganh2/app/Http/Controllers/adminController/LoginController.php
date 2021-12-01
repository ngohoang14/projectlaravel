<?php



namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
class LoginController extends Controller
{
  
    public function index()
    {
       return view('admin.login');
    }
    // public function createPost(){
    // 	//goi ham create ban ghi
    // 	//di chuyen den url: /admin/users/read
    // 	return redirect("admin/home");
    // }
    public function loginPost(Request $request) {
        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
      
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('admin/login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->email;
            $password = $request->password;
            $rememberHiden = $request->rememberHiden;
            if( $rememberHiden == "checked"){
                if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                    // The user is being remembered...
                  // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                  return redirect("admin/home");
                } else {
                    // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                    Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                    return redirect('admin/login');
                }
            }else{
                if( Auth::attempt(['email' => $email, 'password' =>$password, 'level' => '2'])) {
                    // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                    return redirect("admin/home");
                } else {
                    // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                    Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                    return redirect('admin/login');
                }
            }
           
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('admin/login');
    }
}