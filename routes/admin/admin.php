<?php

//后台路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    //后台登录显示
    Route::get('login', 'LoginController@index')->name('login');
    //后台登录处理
    Route::post('login', 'LoginController@login')->name('login');


    //需要登录才能访问的页面 使用中间件来检测
    Route::group(['middleware'=>['checklogin']],function(){

        //后台首页
        Route::match(['get', 'post'], 'index/index', 'IndexController@index')->name('index.index');

        //欢迎页面
        Route::match(['get', 'post'], 'index/welcome', 'IndexController@welcome')->name('index.welcome');

        //退出页面
        Route::any('logout', 'LoginController@getList')->name('index.logout');


        //========================用户管理
        Route::get('user/index', 'UserController@index')->name('user.index');
        Route::any('user/index', 'UserController@index')->name('user.index');

        // 角色列表
        Route::get('role/index', 'RoleController@index')->name('role.index');
        //添加角色
        Route::get('role/add', 'RoleController@add')->name('role.add');


        //========================权限管理
        //权限(节点)列表
        Route::get('node/index', 'NodeController@index')->name('node.index');

        //添加角色权限显示
        Route::get('role/node/{id}', 'RoleController@node')->name('role.node');
        //添加角色权限处理
        Route::post('role/node/{id}', 'RoleController@nodeSave')->name('role.node');
    });



});