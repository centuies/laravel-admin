@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">管理员</li>
            <li class=""><a href="{{ route('admin.create') }}">添加管理员</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
					<thead>
                    <tr>
                        <th style="width: 30px;">ID</th>
                        <th>用户名</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>最后登录时间</th>
                        <th>最后登录IP</th>
                        <th>操作</th>
                    </tr>
					</thead>
					<tbody>
					@foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin['id'] }}</td>
                        <td>{{ $admin['name'] }}</td>
                        <td>@if($admin['status']==1)启用@else禁用@endif</td>
                        <td>{{ $admin['created_at'] }}</td>
                        <td>{{ $admin['last_login'] }}</td>
                        <td>{{ $admin['ip_address'] }}</td>
                        <td>
                            <a href="{{ route('admin.edit',['id'=>$admin['id']]) }}" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
                            <a href="{{ route('admin.destroy',['id'=>$admin['id']]) }}" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
                        </td>
                    </tr>
					</tbody>
					@endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection