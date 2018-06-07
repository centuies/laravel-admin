@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">友情链接</li>
            <li class=""><a href="{{ route('link.create') }}">添加链接</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
                    <thead>
						<tr>
							<th style="width: 30px;">ID</th>
							<th style="width: 30px;">排序</th>
							<th>名称</th>
							<th>链接</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
                    </thead>
                    <tbody>
						@foreach($links as $link)
						<tr>
							<td>{{ $link['id'] }}</td>
							<td>{{ $link['sort'] }}</td>
							<td>{{ $link['name'] }}</td>
							<td>{{ $link['link'] }}</td>
							<td>@if($link['status']==1)显示@else隐藏@endif</td>
							<td>
								<a href="{{ route('link.edit',['id'=>$link['id']]) }}" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
								<a href="{{ route('link.destroy',['id'=>$link['id']]) }}" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
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