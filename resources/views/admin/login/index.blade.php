﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{ $adminurl }}/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ $adminurl }}/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css"/>
    <link href="{{ $adminurl }}/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="{{ $adminurl }}/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>后台管理系统</title>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value=""/>
<div class="header"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <form class="form form-horizontal" method="post">
            @csrf
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="username" value="admin" type="text" placeholder="账户" class="input-text size-L">
                </div>

            </div>
            @if($errors->has('username'))
                <span class="error">{{ $errors->first('username') }}</span>
            @endif
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="password" type="text" value="admin" placeholder="密码" class="input-text size-L">
                </div>

            </div>
            @if($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
            @endif
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input class="input-text size-L" type="text" placeholder="验证码"
                           onblur="if(this.value==''){this.value='验证码:'}"
                           onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
                    <img src=""> <a id="kanbuq" href="javascript:;">看不清，换一张</a></div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <label for="online">
                        <input type="checkbox" name="online" id="online" value="">
                        使我保持登录状态</label>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" class="btn btn-success radius size-L"
                           value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                    <input name="" type="reset" class="btn btn-default radius size-L"
                           value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ $adminurl }}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ $adminurl }}/static/h-ui/js/H-ui.min.js"></script>

</body>
</html>