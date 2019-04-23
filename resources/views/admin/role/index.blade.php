@extends('admin.layouts.main')

@section('cnt')
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 管理员管理
        <span class="c-gray en">&gt;</span> 角色列表
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
           href="javascript:location.replace(location.href);" title="刷新">
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>

    @include('admin.layouts.msg')

    <div class="page-container">

        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">

                <a href="{{ route('admin.role.add') }}" class="btn btn-primary radius">
                    <i class="Hui-iconfont">&#xe600;</i> 添加角色
                </a>
            </span>
        </div>

        <table class="table table-border table-bordered table-bg">
            <thead>
            <tr>
                <th scope="col" colspan="9">角色列表</th>
            </tr>
            <tr class="text-c">
                <th width="40">ID</th>
                <th width="100">角色名称</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr class="text-c">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="td-manage">
                        <a href="{{ route('admin.role.node',$item) }}" class="label label-secondary radius">分配权限</a>
                        <a href="" class="label label-secondary radius">修改</a>
                        <a href="" class="label label-danger radius">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $data->links() }}

@endsection