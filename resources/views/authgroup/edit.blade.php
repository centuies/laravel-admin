@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class=""><a href="{{ route('authgroup.index') }}">权限组</a></li>
            <li class=""><a href="{{ route('authgroup.create') }}">添加权限组</a></li>
            <li class="layui-this">编辑权限组</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="{{ route('authgroup.update',['id'=>$authgroup['id']]) }}" method="post">
					{{ method_field('put') }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" value="{{ $authgroup['name'] }}" required="" lay-verify="required" placeholder="请输入权限组名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="status" value="1" title="启用" @if($authgroup['status']==1)checked="checked"@endif><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>启用</span></div>
                            <input type="radio" name="status" value="0" title="禁用" @if($authgroup['status']==0)checked="checked"@endif><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>禁用</span></div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="hidden" name="id" value="2">
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