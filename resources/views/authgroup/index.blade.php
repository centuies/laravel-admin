@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">权限组</li>
            <li class=""><a href="{{ route('authgroup.create') }}">添加权限组</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
					<thead>
					<tr>
						<th style="width: 30px;">ID</th>
						<th>名称</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
					</thead>
					<tbody>
					@foreach($authgroup as $v)
				   <tr>
						<td>{{ $v['id'] }}</td>
						<td>{{ $v['name'] }}</td>
						<td>@if($v['status']==1)启用@else禁用@endif</td>
						<td>
							<a href="{{ route('authgroup.show',['id'=>$v['id']]) }}" class="layui-btn layui-btn-mini">授权</a>
							<a href="{{ route('authgroup.edit',['id'=>$v['id']]) }}" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
							<a href="{{ route('authgroup.destroy',['id'=>$v['id']]) }}" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
						</td>
					</tr>
					@endforeach
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection