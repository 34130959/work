@extends('admin.layouts.main')

@section('cnt')
    <article class="page-container">
        @include('admin.layouts.msg')

        <form action="{{ route('admin.role.add') }}" method="post" class="form form-horizontal" id="form-member-add">
            @csrf

            <div class="row cl">
                <label class="form-label col-xs-3 col-sm-2"><span class="c-red">*</span>角色名称：</label>
                <div class="formControls col-xs-9 col-sm-10">
                    <input type="text" class="input-text" name="name">
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-3 col-sm-offset-2">
                    <input class="btn btn-primary radius" type="submit" value="添加角色">
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
		// jquery的前端验证插件
		$("#form-member-add").validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 20
				}
			},
			messages: {
				name: {
					required: '角色的名称不能为空',
					minlength: '写的太少'
				}
			},
			onkeyup: false,
			focusCleanup: true,
			// 成功时的样式名
			success: "valid",
			// 验证通过后的处理事件
			submitHandler: function (formDom) {
				formDom.submit();
			}
		});
    </script>
@endsection