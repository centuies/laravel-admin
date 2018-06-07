
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Open Source BMS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="js/layui/css/layui.css">
    <link rel="stylesheet" href="css/admin.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <style>
        .login .login-form input {color: #000;}
    </style>
    <![endif]-->
</head>
<body class="login">
<div class="login-title">Open Source BMS</div>
<form class="layui-form login-form" action="{{ route('login') }}" method="POST">
	{{ csrf_field() }}
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" name="name" required lay-verify="required" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input type="password" name="password" required lay-verify="required" class="layui-input">
        </div>
    </div>

	
  <!--验证码   <div class="layui-form-item">
        <label class="layui-form-label">验证码</label>
        <div class="layui-input-block">
            <input type="text" name="verify" required lay-verify="required" class="layui-input layui-input-inline">
            <img src="/captcha.html" alt="点击更换" title="点击更换" onclick="this.src='/captcha.html?time='+Math.random()" class="captcha">
        </div>
    </div> -->
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="*">登 录</button>
        </div>
    </div>
</form>

<script>
    // 定义全局JS变量
    var GV = {
        current_controller: "admin/{$controller|default=''}/"
    };
</script>

<script src="js/jquery.min.js"></script>
<script src="js/layui/lay/dest/layui.all.js"></script>
<script src="js/admin.js"></script>

<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>

</body>
</html>