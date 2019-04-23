<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //多对多和节点权限
    public function node()
    {
        return $this->belongsToMany(Mode::class,'role_node','role_id','node_id');
    }
}
