<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    /**
     *  节点表或叫权限表
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('节点名称');
            $table->string('route', 100)->nullable('')->comment('路由名称');
            $table->unsignedInteger('pid')->default(0)->comment('上级ID');
            $table->unsignedTinyInteger('is_menu')->default(0)->comment('是否为菜单,0不是,1是');
            $table->timestamps();
            $table->softDeletes();
        });

        //角色与节点对应中间表
        Schema::create('roule_node', function (Blueprint $table) {
            $table->unsignedInteger('role_id')->default(0)->comment('角色ID');
            $table->unsignedInteger('node_id')->default(0)->comment('节点ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nodes');
        Schema::dropIfExists('role_node');
    }
}
