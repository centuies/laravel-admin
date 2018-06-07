@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">轮播分类</li>
            <li class=""><a href="{{ route('slide_category.create') }}">添加分类</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
                    <thead>
						<tr>
							<th style="width: 30px;">ID</th>
							<th>分类名称</th>
							<th>操作</th>
						</tr>
                    </thead>
                    <tbody>
					@foreach($category as $v)
						<tr>
							<td>{{ $v['id'] }}</td>
							<td>{{ $v['name'] }}</td>
							<td>
								<a href="{{ route('slide_category.edit',['id'=>$v['id']]) }}" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
								<a href="{{ route('slide_category.destroy',['id'=>$v['id']]) }}" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
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