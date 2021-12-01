<?php



namespace App\Http\Controllers\frontendController;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
class LoginController extends Controller
{
  
    public function index()
    {
       return view('frontend.login');
    }
    public function register()
    {
       return view('frontend.registerView');
    }
    protected function validator(array $data)
    {
        return Validator::make($data,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ],
            [
                'name.required' => 'Họ và tên là trường bắt buộc',
                'name.max' => 'Họ và tên không quá 255 ký tự',
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'email.max' => 'Email không quá 255 ký tự',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            ]
        );
    }
    protected function create(array $data)
    {
        return DB::table('users')->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'level' => '1',
        ]);
    }
    public function registerPost(Request $request) {
        // Kiểm tra dữ liệu vào
        $allRequest  = $request->all();	
        $validator = $this->validator($allRequest);
     
        if ($validator->fails()) {
            // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return redirect('register')->withErrors($validator)->withInput();
        } else {   
            // Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl
            if( $this->create($allRequest)) {
                $email = $request->input('email');
		        session()->put("userName", $email);
                // Insert thành công sẽ hiển thị thông báo
                Session::flash('success', 'Đăng ký thành viên thành công!');
                return redirect('/');
            } else {
                // Insert thất bại sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Đăng ký thành viên thất bại!');
                return redirect('register');
            }
        }
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
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->email;
            $password = $request->password;
            $rememberHiden = $request->rememberHiden;
            if( $rememberHiden == "checked"){
                if (Auth::check(['email' => $email, 'password' => $password], $remember)) {
                    // The user is being remembered...
                  // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                  $name = DB::table('users')->where('email',$email)->first();
                  session()->put("userName", $name->email);
                  return redirect("/");
                } else {
                    // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                    Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                    return redirect('/');
                }
            }else{
                if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                    $name = DB::table('users')->where('email',$email)->first();
                    session()->put("userName", $name->email);
                    // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                    return redirect("/");
                } else {
                    // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                    Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                    return redirect('login');
                }
            }
           
        }
    }
    public function getLogout(){
        session()->flush('userName');
        return redirect('/');
    }
}