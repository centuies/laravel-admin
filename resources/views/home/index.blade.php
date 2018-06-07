@extends('layouts.admin')
@section('body')

    <!--主体-->
    
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">网站概览</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
                    <tr>
                        <td style="width: 400px;">网站域名</td>
                        <td>{{ $_SERVER['HTTP_HOST'] }}</td>
                    </tr>
                    <tr>
                        <td>网站目录</td>
                        <td>{{ $_SERVER['DOCUMENT_ROOT'] }}</td>
                    </tr>
                    <tr>
                        <td>服务器操作系统</td>
                        <td>{{ PHP_OS }}</td>
                    </tr>
                    <tr>
                        <td>服务器端口</td>
                        <td>{{$_SERVER['SERVER_PORT']}}</td>
                    </tr>
                    <tr>
                        <td>服务器环境</td>
                        <td>{{$_SERVER['SERVER_SOFTWARE']}}</td>
                    </tr>
                    <tr>
                        <td>PHP版本</td>
                        <td>{{ PHP_VERSION }}</td>
                    </tr>
                    <tr>
                        <td>最大上传限制</td>
                        <td>{{ ini_get('upload_max_filesize') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection('body')