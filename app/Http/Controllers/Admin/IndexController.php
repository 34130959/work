<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台首页
    public function index(Request $request)
    {
        //检测用户是否登录,如果没有登录 返回到登录页面

        return view('admin/index/index');
    }

    //欢迎页面
    public function welcome()
    {
        return view('admin.index.welcome');
    }
}
