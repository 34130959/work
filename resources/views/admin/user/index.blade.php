@extends('admin.layouts.main')


@section('cnt')



    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 用户管理
        <span class="c-gray en">&gt;</span> 用户列表
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
           href="javascript:location.replace(location.href);" title="刷新">
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>

    <div class="page-container">
        <div class="text-c"> 日期范围：
            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemax"
                   class="input-text Wdate" style="width:120px;">
            -
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })"
                   id="datemin" class="input-text Wdate" style="width:120px;">
            <input type="text" class="input-text" style="width:250px" id="kw">
            <button type="submit" class="btn btn-success radius" id="searchBtn">
                <i class="Hui-iconfont">&#xe665;</i> 搜用户
            </button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a href="javascript:;" onclick="datadel()"
                                                                   class="btn btn-danger radius"><i
                            class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;"
                                                                          onclick="member_add('添加用户','member-add.html','','510')"
                                                                          class="btn btn-primary radius"><i
                            class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>88</strong> 条</span>
        </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th width="100"><input type="checkbox" name="" value=""></th>
                    <th width="100">ID</th>
                    <th width="100">昵称</th>
                    <th width="120">账号</th>
                    <th width="250">邮箱</th>
                    <th width="100">角色</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr class="text-c">
                        <td><input type="checkbox" value="{{ $item->id }}" name="ids[]"></td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nikename }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role->name }}</td>
                        <td class="td-manage">
                            <a href="" class="label label-secondary radius">修改</a>
                            <a href="" class="label label-danger radius">删除</a>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('js')
    <script type="text/javascript" src="{{ $adminurl }}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{ $adminurl }}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ $adminurl }}/lib/laypage/1.2/laypage.js"></script>


    <script>
	    // 服务器端分页
	    var datatable = $('.table-sort').dataTable({
		    // 分页数量
		    "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, '所有']],
		    // 默认排序的列
		    "order": [[1, "asc"]],
		    columnDefs: [
			    // 索引0列和第6列，不进行排序
			    {targets: [0, 7], orderable: false}
		    ],
		    // 是否显示搜索框
		    "searching": false,
		    // 是否显示正在加载  此选项对ajax才生效的
		    processing: true,
		    // 告诉datatables使用服务器端分页
		    serverSide: true,
		    ajax: {
			    url: '',
			    type: 'POST',
			    // 头信信息 laravel post请求时 csrf
			    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
			    // 动态获取传到服务器端的数据
			    data: function (item) {
				    item.kw = $('#kw').val();
				    item.sdt = $('#datemin').val();
				    item.edt = $('#datemax').val();
			    }
		    },
		    // columns要对tr中的td单元格中的内容进行数据填充
		    columns: [
			    // 总的数量与表格的列的数量一致，不多也不少
			    // 字段名称与sql查询出来的字段时要保持一致，就是服务器返回数据对应的字段名称
			    // defaultContent 和 className 可选参数
			    {'data': 'aa', "defaultContent": '<input type="checkbox" value="0" name="ids[]">'},
			    {'data': 'id'},
			    {'data': 'nikename'},
			    {'data': 'username'},
			    {'data': 'email'},
			    {'data': 'role.name'},
			    {'data': 'udt'},
			    {'data': 'bb', "defaultContent": ''}
		    ],
		    // 生成一行的时就是触发
		    createdRow: function (dom, data, dataIndex) {
			    // 操作按钮
			    var html = `
                        <a href="/user/edit/${data.id}" class="label label-secondary radius">修改</a>
                        <a href="/user/del/${data.id}" class="label label-danger radius delitem">删除</a>`;
			    // 找到当前的列
			    $(dom).find('td:last').html(html);

		    }
	    });

	    // 事件委托  删除用户记录
	    $('.table-sort').on('click', '.delitem', function () {

		    let url = $(this).attr('href');

		    // 确认框
		    layer.confirm('您真的要删除此条信息吗？', {
			    btn: ['删除', '取消']
		    }, () => {

			    layer.msg('的确很重要', {icon: 1, time: 1000}, () => {
				    $(this).parents('tr').remove();
			    });

		    });



		    return false;
	    });

	    // 搜索功能的实现
	    $('#searchBtn').click(function () {
		    // 让原来的datatables重新加载一次
		    datatable.api().ajax.reload();
	    });

    </script>
@endsection

