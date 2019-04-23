<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    //定义一个追加的属性名称
    protected $appends = ['udt'];
    //黑名单
    protected $guarded = [];

    //用户基于角色的
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    //访问器  调用访问器 来生成属性对应的值
    public function getUdtAttribute()
    {
        return date('Y年m月d日',strtotime($this->attributes['updated_at']));
    }
}
