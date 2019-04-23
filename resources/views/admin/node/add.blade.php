@extends('admin.layouts.main')

@section('cnt')
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 管理员管理
        <span class="c-gray en">&gt;</span> 节点列表
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
           href="javascript:location.replace(location.href);" title="刷新">
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>
    <article class="page-container">
        @include('admin.layouts.msg')

        <form action="{{ route('admin.node.add') }}" method="post" class="form form-horizontal" id="form-member-add">
            @csrf

            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2">上级名称：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <span class="select-box">
                        <select class="select" size="1" name="pid">
                            <option value="0" selected>=== 顶级 ===</option>
                            @foreach($data as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </span>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>节点名称：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" class="input-text" name="name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2">路由名称：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" class="input-text" name="route">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>是否菜单：</label>
                <div class="formControls col-xs-9 col-sm-10 skin-minimal">
                    <div class="radio-box">
                        <input name="is_menu" type="radio" value="1">
                        <label for="sex-1">是</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" value="0" name="is_menu" checked>
                        <label for="sex-2">否</label>
                    </div>
                </div>
            </div>

            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-3 col-sm-offset-2">
                    <input class="btn btn-primary radius" type="submit" value="添加节点">
                </div>
            </div>
        </form>
    </article>

@endsection


@section('js')
    <script type="text/javascript" src="{{ $adminurl }}/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="{{ $adminurl }}/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="{{ $adminurl }}/lib/jquery.validation/1.14.0/messages_zh.js"></script>
    <script>
		$('.skin-minimal input').iCheck({
			checkboxClass: 'icheckbox-blue',
			radioClass: 'iradio-blue',
			increaseArea: '20%'
		});

		// jquery的前端验证插件
		$("#form-member-add").validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 20
				}
			},
			onkeyup: false,
			focusCleanup: true,
			// 成功时的样式名
			success: "valid",
			// 验证通过后的，处理事件
			submitHandler: function (formDom) {
				formDom.submit();
			}
		});
    </script>
@endsection