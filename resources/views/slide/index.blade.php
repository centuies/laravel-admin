@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">轮播图管理</li>
            <li class=""><a href="{{ route('slide.create') }}">添加轮播图</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
                    <thead>
						<tr>
							<th style="width: 30px;">ID</th>
							<th style="width: 30px;">排序</th>
							<th>名称</th>
							<th>分类</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
                    </thead>
                    <tbody>
						@foreach($slide as $v)
						 <tr>
							<td>{{ $v['id'] }}</td>
							<td>{{ $v['sort'] }}</td>
							<td>{{ $v['name'] }}</td>
							<td>{{ $v['category'] }}</td>
							<td>@if($v['status'] == 1)显示@else隐藏@endif</td>
							<td>
								<a href="{{ route('slide.edit',['id'=>$v['id']]) }}" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
								<a href="{{ route('slide.destroy',['id'=>$v['id']]) }}" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
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