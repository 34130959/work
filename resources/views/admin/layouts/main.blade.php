<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ $adminurl }}/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ $adminurl }}/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="{{ $adminurl }}/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="{{ $adminurl }}/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="{{ $adminurl }}/static/h-ui.admin/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="{{ $adminurl }}/css/paginate.css"/>
    <title>后台管理</title>
    @yield('css')
</head>
<body>
@yield('cnt')

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{ $adminurl }}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ $adminurl }}/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{ $adminurl }}/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{ $adminurl }}/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->


@yield('js')
</body>
</html>