@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class=""><a href="{{ route('nav.index') }}">导航管理</a></li>
            <li class=""><a href="{{ route('nav.create') }}">添加导航</a></li>
            <li class="layui-this">编辑导航</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="{{ route('nav.update',['id'=>$item['id']]) }}" method="post">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">上级导航</label>
                        <div class="layui-input-block">
                            <select name="pid" required="" lay-verify="required">
                                <option value="0">一级导航</option>
								@foreach($navs as $v)
									@if($v['id']==$item['id'])
										<option disabled="disabled" value="">@if($v['level']!==1)|@endif @for($i=1;$i<$v['level'];$i++)---- @endfor{{ $v['name'] }}</option>	
									@else
										<option  value="{{ $v['id'] }}" 
										@if($v['id']==$item['pid'])selected="selected"@endif>@if($v['level']!==1)|@endif @for($i=1;$i<$v['level'];$i++)---- @endfor{{ $v['name'] }}</option>
									@endif
								@endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">导航名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" value="{{ $item['name'] }}" required="" lay-verify="required" placeholder="请输入导航名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">别名</label>
                        <div class="layui-input-block">
                            <input type="text" name="alias" value="{{ $item['alias'] }}" placeholder="（选填）请输入导航别名" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">链接</label>
                        <div class="layui-input-block">
                            <input type="text" name="link" value="{{ $item['link'] }}" placeholder="（选填）请输入导航链接" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">图标</label>
                        <div class="layui-input-block">
                            <input type="text" name="icon" value="{{ $item['icon'] }}" placeholder="（选填）如：fa fa-home" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="status" value="1" title="显示" @if($item['status']==1)checked="checked"@endif><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>显示</span></div>
                            <input type="radio" name="status" value="0" title="隐藏" @if($item['status']==0)checked="checked"@endif><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>隐藏</span></div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">打开方式</label>
                        <div class="layui-input-block">
                            <input type="radio" name="target" value="0" title="默认" @if($item['target']==0)checked="checked"@endif><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>默认</span></div>
                            <input type="radio" name="target" value="1" title="新窗口"@if($item['target']==1)checked="checked"@endif><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>新窗口</span></div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-block">
                            <input type="text" name="sort" value="{{ $item['sort'] }}" required="" lay-verify="required" class="layui-input">
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