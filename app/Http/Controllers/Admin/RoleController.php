<?php
// 角色管理
namespace App\Http\Controllers\Admin;

use App\Models\Node;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    // 列表
    public function index()
    {

        $data = Role::paginate($this->pagesize);
        return view('admin.role.index', compact('data'));
    }

    // 添加的显示
    public function add()
    {
        return view('admin.role.add');
    }

    // 添加的处理
    public function store(Request $request)
    {
        // 验证
        $input = $this->validate($request, [
            'name' => 'required'
        ]);

        Role::create($input);

        return redirect(route('admin.role.index'))->with('success', '添加角色成功');
    }

    // 添加权限
    public function node(int $id)
    {
        $role = Role::find($id);

        // 读取权限列表
        $node = Node::all()->toArray();
        $data = subTree($node);

        // 读取已经有的权限节点
        $auths = $role->nodes()->pluck('id')->toArray();

        return view('admin.role.node', compact('role', 'data', 'auths'));
    }

    // 添加权限
    public function nodeSave(Request $request, int $id)
    {
        $role = Role::find($id);

        // 获取数据
        $ids = $request->get('node_id');

        // 多对多的模型关系
        $role->nodes()->sync($ids);

        return redirect(route('admin.role.index'))->with('success', '分配节点权限成功');
    }


}
