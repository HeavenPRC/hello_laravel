<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{
     public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create()
    {
    	return view('sessions.create');
    }

    public function store(Request $request)
    {
    	$credentials = $this->validate($request, [
    		'email' => 'required|email|max:255',
    		'password' => 'required'
    	]);
    	//第一个参数为需要进行用户身份认证的数组，第二个参数为是否为用户开启『记住我』功能的布尔值
    	if (Auth::attempt($credentials, $request->has('remember'))){
            if (Auth::user()->activated) {
                //登录成功的操作
                session()->flash('success', '欢迎回来！');
                return redirect()->intended(route('users.show', [Auth::user()]));

            } else {
                Auth::logout();
                session()->flash('warning', '你的账号未激活，请检查邮箱中的注册邮件进行激活。');
                return redirect('/');
            }
    	} else {
            //登录失败的操作
            session()->flash('danger', '很抱歉,您的邮箱和密码不匹配');
            //重定向到上一页
            return redirect()->back();
    	}
    }

    public function destroy()
    {
    	Auth::logout();
    	session()->flash('success', '您已成功退出！');
    	return redirect('login');
    }
}
