<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Open Source BMS</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="{{ asset('js/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!--CSS引用-->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
	@yield('css')
    <!--[if lt IE 9]>
    <script src="css/html5shiv.min.js"></script>
    <script src="css/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <!--头部-->
    <div class="layui-header header">
        <a href=""><img class="logo" src="{{ asset('images/admin_logo.png') }}" alt=""></a>
        <ul class="layui-nav" style="position: absolute;top: 0;right: 20px;background: none;">
            <li class="layui-nav-item"><a href="/" target="_blank">前台首页</a></li>
            <li class="layui-nav-item"><a href="" data-url="/clear" id="clear-cache">清除缓存</a></li>
            <li class="layui-nav-item" style="width:96px;height:60px">
                <!--<a href="javascript:;"></a> -->
				<a href="javascript:;">{{ Auth::user()->name }}</a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a href="{{ route('reset.index') }}">修改密码</a></dd>
                    <dd><a href="{{ route('logout') }}">退出登录</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <!--侧边栏-->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree">
                <li class="layui-nav-item layui-nav-title"><a>管理菜单</a></li>
                <li class="layui-nav-item">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> 网站信息</a>
                </li>
                <div class="layui-side layui-bg-black">
					<div class="layui-side-scroll">
						<ul class="layui-nav layui-nav-tree">
							<li class="layui-nav-item layui-nav-title"><a>管理菜单</a></li>
							<li class="layui-nav-item layui-this">
								<a href="{{ route('home') }}"><i class="fa fa-home"></i> 网站信息</a>
							</li>
							<li class="layui-nav-item">
								<a href="javascript:;"><i class="fa fa-gears"></i> 系统配置<span class="layui-nav-more"></span></a>
								<dl class="layui-nav-child">
									<dd><a href="{{ route('siteconfig.index') .'/'}}"> 站点配置</a></dd>
									<dd><a href="{{ route('reset.index').'/' }}"> 修改密码</a></dd>
								</dl>
							</li>
							<li class="layui-nav-item">
								<a href="javascript:;"><i class="fa fa-bars"></i> 菜单管理<span class="layui-nav-more"></span></a>
								<dl class="layui-nav-child">
									<dd><a href="{{ route('menu.index').'/' }}"> 后台菜单</a></dd>
									<dd><a href="{{ route('nav.index').'/' }}"> 导航管理</a></dd>
								</dl>
							</li>
							<li class="layui-nav-item">
								<a href="javascript:;"><i class="fa fa-file-text"></i> 内容管理<span class="layui-nav-more"></span></a>
								<dl class="layui-nav-child">
									<dd><a href="{{ route('category.index').'/'}}"> 栏目管理</a></dd>
									<dd><a href="{{ route('article.index').'/' }}"> 文章管理</a></dd>
								</dl>
							</li>
							<li class="layui-nav-item">
								<a href="javascript:;"><i class="fa fa-users"></i> 用户管理<span class="layui-nav-more"></span></a>
								<dl class="layui-nav-child">
									<dd><a href="{{ route('user.index').'/' }}"> 普通用户</a></dd>
									<dd><a href="{{ route('admin.index').'/' }}"> 管理员</a></dd>
									<dd><a href="{{ route('authgroup.index').'/' }}"> 权限组</a></dd>
								</dl>
							</li>
							<li class="layui-nav-item">
								<a href="javascript:;"><i class="fa fa-wrench"></i> 扩展管理<span class="layui-nav-more"></span></a>
								<dl class="layui-nav-child">
									<dd><a href="{{ route('slide_category.index').'/' }}"> 轮播分类</a></dd>
									<dd><a href="{{ route('slide.index').'/' }}"> 轮播图管理</a></dd>
									<dd><a href="{{ route('link.index').'/' }}"> 友情链接</a></dd>
								</dl>
							</li>
							
							<li class="layui-nav-item" style="height: 30px; text-align: center"></li>
						<span class="layui-nav-bar" style="top: 337.5px; height: 0px; opacity: 0;"></span>
						</ul>
					</div>
                </div>
            </ul>
        </div>
    </div>

	@yield('body')
   
    <!--底部-->
    <div class="layui-footer footer">
        <div class="layui-main">
            <p>2016-2017 &copy; <a href="https://github.com/xiayulei/open_source_bms" target="_blank">Open Source BMS</a></p>
        </div>
    </div>
</div>

<script>
    // 定义全局JS变量
    var GV = {
        current_controller: "/{{isset($controller)?$controller:'default='}}",
        base_url: "/public/static"
    };
</script>
<!--JS引用-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/layui/lay/dest/layui.all.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
@yield('js')

<!--页面JS脚本-->
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>
@yield('script')
</body>
</html>