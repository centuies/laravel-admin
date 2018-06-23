<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Open Source BMS</title>
    <meta name="description" content="Open Source BMS，全称Open Source Background System，基于ThinkPHP5开发的开源后台管理系统">
    <link rel="stylesheet" href="js/layui/css/layui.css">
    <style>
        .header {
            width: 100%;
            height: 400px;
            background: url(images/login-bg.png) #56bc94;
            text-align: center;
        }

        .header .top-nav {
            height: 60px;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .header .top-nav h1 {
            display: inline-block;
            width: 300px;color: #fff;
            position: absolute;
            left: 0;
            top: 0;
            font-size: 24px;
            line-height: 60px;
            text-align: left;
        }

        .header .top-nav .layui-nav {
            position: absolute;
            top: 0;right: 0;
            width: 600px;
            text-align: right;
            background: none;
        }
        .header .top-nav .layui-nav a {color: #fff;}
        .header .download-btn {
            display: inline-block;
            width: 200px;
            height: 60px;
            line-height: 60px;
            margin-top: 150px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            font-size: 18px;
            transition: all .3s;
        }
        .header .download-btn:hover {
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .header .description {
            width: 200px;
            margin: 30px auto;
            text-align: left;
            color: #fff;
        }

        .content {margin-top: 50px;}
    </style>
</head>
<body>
<div class="header">
    <div class="top-nav">
        <div class="layui-main">
            <h1>Open Source BMS</h1>
            <ul class="layui-nav">
                <li class="layui-nav-item"><a href="">首页</a></li>
                <li class="layui-nav-item"><a href="/login" target="_blank">后台演示</a></li>
                <li class="layui-nav-item"><a href="https://github.com/centuies/laravel-admin" target="_blank">GitHub</a></li>
            </ul>
        </div>
    </div>

    <a href="https://github.com/centuies/laravel-admin/archive/master.zip" target="_blank" class="download-btn">下 载</a>
</div>

<div class="layui-main content">
    <fieldset class="layui-elem-field">
        <legend>Open Source BMS</legend>
        <div class="layui-field-box">
		<p>原项目是由thinkphp5写的一个后台管理系统，地址为<a href="https://github.com/xiayulei/open_source_bms" target="_blank">https://github.com/xiayulei/open_source_bms</a>。<br/>作为练习，自己用laravel5.5重新实现了整个项目。</p>
        </div>
    </fieldset>

</div>

<script src="js/layui/lay/dest/layui.all.js"></script>
<script>
    var element = layui.element();
</script>
</body>
</html>