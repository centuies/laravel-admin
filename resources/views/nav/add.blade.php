@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class=""><a href="{{ route('nav.index') }}">导航管理</a></li>
            <li class="layui-this">添加导航</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="{{ route('nav.store') }}" method="post">
				{{ csrf_field() }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">上级导航</label>
                        <div class="layui-input-block">
                            <select name="pid" lay-verify="required">
                                <option value="0">一级导航</option>
								@foreach($navs as $v)
									<option value="{{ $v['id'] }}" @if(isset($item)&&$item['id']==$v['id'])selected="selected"@endif>@if($v['level']!==1)|@endif @for($i=1;$i<$v['level'];$i++)---- @endfor{{ $v['name'] }}</option>
								@endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">导航名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" value="" required="" lay-verify="required" placeholder="请输入导航名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">别名</label>
                        <div class="layui-input-block">
                            <input type="text" name="alias" value="" placeholder="（选填）请输入导航别名" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">链接</label>
                        <div class="layui-input-block">
                            <input type="text" name="link" value="" placeholder="（选填）请输入导航链接" class="layui-input">
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
                        <label class="layui-form-label">打开方式</label>
                        <div class="layui-input-block">
                            <input type="radio" name="target" value="0" title="默认" checked="checked"><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>默认</span></div>
                            <input type="radio" name="target" value="1" title="新窗口"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>新窗口</span></div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-block">
                            <input type="text" name="sort" value="0" required="" lay-verify="required" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit=""  lay-filter="*">保存</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
