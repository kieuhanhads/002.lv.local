<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('admin.user.login', [
            'title' =>  'Trang login'
        ]);
    }
    public function loginStore(Request $request)
    {
        $this->validate($request, [
            'email'  =>  'required|email:filter',
            'password'  => 'required'
        ]);

        if (Auth::attempt([
            'email' =>  $request->input('email'),
            'password'  =>  $request->input('password')
        ], $request->input('agree'))) {
            return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công');
        }
        return back()->withErrors([
            'msg' => 'Email hoặc mật khẩu ko đúng.',
        ]);
    }
    public function register()
    {
        return view('admin.user.register', [
            'title' =>  'Trang Đăng Ký'
        ]);
    }
    public function registerStore(RegisterRequest $request)
    {
        User::create($request->all());
        return redirect(route('login'))->with('msg', 'Đăng ký thành công');
    }
    public function forgot()
    {
        return view('admin.user.forgot', [
            'title' =>  'Lấy lại mật khẩu'
        ]);
    }
}
