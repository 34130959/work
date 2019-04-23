<?php

namespace App\Http\Controllers\Admin;

use App\Models\Node;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NodeController extends BaseController
{

    // 列表
    public function index()
    {

        $data = Node::paginate($this->pagesize);

        return view('admin.node.index', compact('data'));
    }

    // 添加显示
    public function add()
    {
        $data = Node::where('pid', 0)->get();

        return view('admin.node.add', compact('data'));
    }

    // 添加处理
    public function store(Request $request)
    {
        // 验证
        $this->validate($request, [
            'name' => 'required'
        ]);

        Node::create($request->except(['_token']));

        return redirect(route('admin.node.index'))->with('success', '添加节点成功');
    }


}
