<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /*
     * 后台用户管理表
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id')->default(1)->comment('角色ID');
            $table->string('username', 50)->default('')->comment('用户名');
            $table->string('nikename', 50)->default('')->comment('昵称');
            $table->string('password', 255)->default('')->comment('密码');
            $table->string('email', 255)->default('')->comment('邮箱');
            $table->string('phone', 15)->default('')->comment('手机号码');
            $table->unsignedInteger('click')->default(0)->comment('登录次数');
            $table->timestamps();
            //软删除
            $table->softDeletes();
            //退出
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
