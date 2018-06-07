@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class=""><a href="{{ route('admin.index') }}">管理员</a></li>
            <li class=""><a href="{{ route('admin.create') }}">添加管理员</a></li>
            <li class="layui-this">编辑管理员</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="{{ route('admin.update',['id'=>$admin['id']]) }}" method="post">
					{{ method_field('PUT') }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" value="{{ $admin['name'] }}" required="" lay-verify="required" placeholder="请输入用户名" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="password" value="" placeholder="（选填）如不修改则留空" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">重复密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="repeat_password" value="" placeholder="（选填）如不修改则留空" class="layui-input">
                        </div>
                    </div>
                   <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="status" value="1" title="启用" @if($admin['status'] == 1) checked="checked" @endif>
                            <input type="radio" name="status" value="0" title="禁用"
							@if($admin['status'] == 0) checked="checked" @endif>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属权限组</label>
                        <div class="layui-input-block">
                            <select name="auth_group" lay-verify="required">
								@foreach($authgroup as $v)
                                <option value="{{ $v['id'] }}" @if($admin['auth_group'] == $v['id'])selected="selected"@endif>{{ $v['name'] }}</option>
								@endforeach
                            </select>
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