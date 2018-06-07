@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">导航管理</li>
            <li class=""><a href="{{ route('nav.create') }}">添加导航</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
					<thead>
						<tr>
							<th style="width: 30px;">ID</th>
							<th style="width: 30px;">排序</th>
							<th>导航名称</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach($navs as $v)
							<tr>
								<td>{{ $v['id'] }}</td>
								<td>{{ $v['sort'] }}</td>
								<td>@if($v['level']!==1)|@endif @for($i=1;$i<$v['level'];$i++)---- @endfor{{ $v['name'] }}</td>
								<td>@if($v['status']==0)隐藏@else显示@endif</td>
								<td>
									<a href="{{ route('nav.show',['id'=>$v['id']]) }}" class="layui-btn layui-btn-mini">添加子导航</a>
									<a href="{{ route('nav.edit',['id'=>$v['id']]) }}" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
									<a href="{{ route('nav.destroy',['id'=>$v['id']]) }}" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
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
