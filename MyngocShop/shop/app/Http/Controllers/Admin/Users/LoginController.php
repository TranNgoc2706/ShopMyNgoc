<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login',[ //phương thức tra về view admin.users.login
            'title' => 'đăng nhập hệ thống'//truyền biến title là đăng nhập hệ thống
        ]
        );
    }
    public function store(Request $request)//xử lý việc đăng nhập 
    {
        $this->validate($request,[ //kiểm tra các dữ liệu đầu vào 0 được trống
            'email' => 'required|email:filter',
             'password' =>'required'
        ]);

        if(Auth::attempt(['email'=>$request->input('email'),//kiểm tra đăng nhập so khớp 
            'password'=>$request->input('password')//email và pas được cung cấp từ $request
            ],$request->input('remember'))){
                return  redirect()->route('admin');//nếu đúng chuyển hướng đến admin
        }
        Session()->flash('error','email hoac mat khau sai!');
        return redirect()->back();//quay lai trang dang nhap báo lỗi
    }
}
