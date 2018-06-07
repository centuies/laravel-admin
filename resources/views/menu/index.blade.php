@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">后台菜单</li>
            <li class=""><a href="{{ route('menu.create') }}">添加菜单</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
					<thead>
						<tr>
							<th style="width: 30px;">ID</th>
							<th style="width: 30px;">排序</th>
							<th>菜单名称</th>
							<th>路由名称</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach($menu as $v)
						 <tr>
							<td>{{ $v['id'] }}</td>
							<td>{{ $v['menu_sort'] }}</td>
							<td>@if($v['level']==1){{ $v['menu_name']}}@else|@for($i=1;$i<$v['level'];$i++) ----@endfor{{ $v['menu_name'] }}@endif</td>
							<td>{{ $v['route'] }}</td>
							<td>@if($v['status']==0)隐藏@else显示@endif</td>
							<td>
								<a href="{{ route('menu.show',['id'=>$v['id']]) }}" class="layui-btn layui-btn-mini">添加子菜单</a>
								<a href="{{ route('menu.edit',['id'=>$v['id']]) }}" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
								<a href="{{ route('menu.destroy',['id'=>$v['id']]) }}" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
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