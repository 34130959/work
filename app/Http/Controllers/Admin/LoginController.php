<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //登录界面
    public function index()
    {
//        判断用户是否已经登录
        if (auth()->guard('admin')->check()) {
            //表示用户已经登录,还没有退出
            return redirect(route('admin.index.index'));
        }
        return view('admin.login.index');
    }

    //登录处理
    public function login(Request $request)
    {

        //验证
        $input = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => '用户名不能为空',
            'password.required' => '登录密码不能为空'
        ]);

        //使用auth来实现登录
        $bool = auth()->guard('admin')->attempt($input);

//        dump(auth()->guard('admin')->user()->nikename);
//
        // check 用来检测用户是否登录  用户登录返回true
//        dump(auth()->guard('admin')->check());

        //登录失败
        if (!$bool) {
            session()->flash();
            return redirect()->back()->withErrors(['errors' => '登录失败']);
        }

        // 给登录次数+1
        $model = auth()->guard('admin')->user();
        $model->increment('click');

        //登录成功 跳转到后台首页 闪存传值
        return redirect(route('admin.index.index'))->with('success', '登录成功');
    }

    //退出
    public function logout()
    {
        auth()->guard('admin')->logout();
        //跳转到首页或登录页面
        return redirect(route('admin.login'));
    }

}





