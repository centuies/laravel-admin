@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class=""><a href="{{ route('menu.index') }}">后台菜单</a></li>
            <li class="layui-this">添加菜单</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="{{ route('menu.store') }}" method="post">
					{{ csrf_field() }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">上级菜单</label>
                        <div class="layui-input-block">
                            <select name="pid" lay-verify="required">
								<option value="0">一级菜单</option>
								@foreach($menu as $v)
									@if(isset($item)&&$item['id'] == $v['id'])
										<option value="{{ $v['id'] }}" selected="selected" >@if($v['level']==0)$v['menu_name']@else| @for($i=0;$i<$v['level'];$i++) ----@endfor {{$v['menu_name']}}@endif</option>
									@else
										<option value="{{ $v['id'] }}">@if($v['level']==0)$v['menu_name']@else| @for($i=0;$i<$v['level'];$i++) ----@endfor {{$v['menu_name']}}@endif</option>
									@endif
								@endforeach
							</select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">菜单名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="menu_name" value="" required="" lay-verify="required" placeholder="请输入菜单名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">路由名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="route" value="" lay-verify="required" placeholder="请输入路由名称 如：photos.index" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">图标</label>
                        <div class="layui-input-block">
                            <input type="text" name="icon" value="" placeholder="（选填）如：fa fa-home" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="status" value="1" title="显示" checked="checked"><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>显示</span></div>
                            <input type="radio" name="status" value="0" title="隐藏"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>隐藏</span></div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-block">
                            <input type="text" name="menu_sort" value="0" required="" lay-verify="required" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="*">保存</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection