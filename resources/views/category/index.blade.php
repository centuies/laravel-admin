@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">栏目管理</li>
            <li class=""><a href="{{ route('category.create') }}">添加栏目</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
					<thead>
                    <tr>
                        <th style="width: 30px;">ID</th>
                        <th style="width: 30px;">排序</th>
                        <th>栏目名称</th>
                        <th>操作</th>
                    </tr>
					</thead>
					<tbody>
					@foreach($category as $v)
					<tr>
						<td>{{ $v['id'] }}</td>
						<td>{{ $v['sort'] }}</td>
						<td>@if($v['level']==0){{ $v['name'] }}@else | @for($i=0;$i<$v['level'];$i++)---- @endfor{{ $v['name'] }}@endif</td>
						<td>
							<a href="{{ route('category.show',['id'=>$v['id']]) }}" class="layui-btn layui-btn-mini">添加子栏目</a>
							<a href="{{ route('category.edit',['id'=>$v['id']]) }}" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
							<a href="{{ route('category.destroy',['id'=>$v['id']]) }}" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
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