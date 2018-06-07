@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">用户管理</li>
            <li class=""><a href="{{ route('user.create') }}">添加用户</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">

                <form class="layui-form layui-form-pane" action="{{ route('user.index') }}" method="get">
                    <div class="layui-inline">
                        <label class="layui-form-label">关键词</label>
                        <div class="layui-input-inline">
                            <input type="text" name="keyword" value="{{ @$keyword }}" placeholder="请输入关键词" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn">搜索</button>
                    </div>
                </form>
                <hr>

                <table class="layui-table">
					<thead>
                    <tr>
                        <th style="width: 30px;">ID</th>
                        <th>用户名</th>
                        <th>手机</th>
                        <th>邮箱</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>最后登录时间</th>
                        <th>最后登录IP</th>
                        <th>操作</th>
                    </tr>
					</thead>
					<tbody>
					@foreach($users as $v)
					<tr>
                        <td>{{ $v['id'] }}</td>
                        <td>{{ $v['name'] }}</td>
                        <td>{{ $v['phone'] }}</td>
                        <td>{{ $v['email'] }}</td>
                        <td>@if($v['status']==1)启用@else禁用@endif</td>
                        <td>{{ $v['created_at'] }}</td>
                        <td>{{ $v['last_login'] }}</td>
                        <td>{{ $v['ip_address'] }}</td>
                        <td>
                            <a href="{{ route('user.edit',['id'=>$v['id']]) }}" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
                            <a href="{{ route('user.destroy',['id'=>$v['id']]) }}" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
                        </td>
                    </tr>
					@endforeach
					</tbody>
                </table>
                <!--分页-->
            </div>
        </div>
    </div>
</div>
@endsection