@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class=""><a href="{{ route('slide.index') }}">轮播图管理</a></li>
            <li class=""><a href="{{ route('slide.create') }}">添加轮播图</a></li>
            <li class="layui-this">编辑轮播图</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="{{ route('slide.update',['id'=>$slide['id']]) }}" method="post">
					{{ method_field('put') }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属分类</label>
                        <div class="layui-input-block">
                            <select name="cid" lay-verify="required">
								@foreach($category as $v)
                                <option value="{{ $v['id'] }}" @if($v['id']==$slide['cid'])selected="selected"@endif>{{ $v['name'] }}</option>
								@endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" value="{{ $slide['name'] }}" required  lay-verify="required" placeholder="请输入名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">说明</label>
                        <div class="layui-input-block">
                            <textarea name="description" placeholder="（选填）请输入说明" id="description" class="layui-textarea">{{ $slide['description'] }}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">图片</label>
                        <div class="layui-input-block">
                            <input type="text" name="image" value="{{ $slide['image'] }}" placeholder="（选填）请上传图片" class="layui-input layui-input-inline" id="thumb">
                            <input type="file" name="picture" class="layui-upload-file">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">链接</label>
                        <div class="layui-input-block">
                            <input type="text" name="link" value="{{ $slide['link'] }}" placeholder="（选填）请输入链接" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">打开方式</label>
                        <div class="layui-input-block">
                            <input type="radio" name="target" value="_self" title="默认" @if($slide['target']=='_self')checked="checked"@endif>
                            <input type="radio" name="target" value="_blank" title="新窗口" @if($slide['target']=='_blank')checked="checked"@endif>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="status" value="1" title="显示" @if($slide['status']==1)checked="checked"@endif>
                            <input type="radio" name="status" value="0" title="隐藏" @if($slide['status']==0)checked="checked"@endif>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-block">
                            <input type="text" name="sort" value="{{ $slide['sort'] }}" required lay-verify="required" placeholder="请输入排序" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="hidden" name="id" value="">
                            <button class="layui-btn" lay-submit lay-filter="*">更新</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection