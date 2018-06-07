@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class=""><a href="{{ route('menu.index') }}">后台菜单</a></li>
            <li class=""><a href="{{ route('menu.create') }}">添加菜单</a></li>
            <li class="layui-this">编辑菜单</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="{{ route('menu.update',['id'=>$menu['id']]) }}" method="post">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">上级菜单</label>
                        <div class="layui-input-block">
                            <select name="pid" lay-verify="required">
								@if($menu['pid']==0)
                                <option selected="selected" value="0">一级菜单</option>
								@else
								<option value="0">一级菜单</option>
								@endif
								@foreach($menus as $v)
									@if($menu['id'] == $v['id'])
										<option disabled="disabled" value="">@if($v['level']==1){{ $v['menu_name'] }}@else|@for($i=0;$i<$v['level'];$i++) ----@endfor{{ $v['menu_name'] }}@endif</option>
									  @else
										<option value="{{ $v['id'] }}" @if($menu['pid'] == $v['id'])selected="selected"@endif>@if($v['level']==1){{ $v['menu_name'] }}@else|@for($i=0;$i<$v['level'];$i++) ----@endfor{{ $v['menu_name'] }}@endif</option>
									@endif
								@endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">菜单名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="menu_name" value="{{ $menu['menu_name'] }}" required="" lay-verify="required" placeholder="请输入菜单名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">路由名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="route" value="{{ $menu['route'] }}"   placeholder="请输入路由名称 如：photos.index" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">图标</label>
                        <div class="layui-input-block">
                            <input type="text" name="icon" value="{{ $menu['icon'] }}" placeholder="（选填）如：fa fa-home" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="status" value="1" title="显示" @if($menu['status']==1)checked="checked"@endif><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>显示</span></div>
                            <input type="radio" name="status" value="0" title="隐藏" @if($menu['status']==0)checked="checked"@endif><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>隐藏</span></div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-block">
                            <input type="text" name="menu_sort" value="{{ $menu['menu_sort'] }}" required="" lay-verify="required" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="*">更新</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection