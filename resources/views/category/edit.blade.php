@include('UEditor::head')
@extends('layouts.admin')
@section('body')
<div class="layui-body" style="">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief" style="">
        <ul class="layui-tab-title">
            <li class=""><a href="{{ route('category.index') }}">栏目管理</a></li>
            <li class=""><a href="{{ route('category.create') }}">添加栏目</a></li>
            <li class="layui-this">编辑栏目</li>
        </ul>
        <div class="layui-tab-content" style="">
            <div class="layui-tab-item layui-show" style="">
                <form class="layui-form form-container" action="{{ route('category.update',['id'=>$item['id']]) }}" method="post" enctype="multipart/form-data">
				{{ method_field('PUT') }}
				{{ csrf_field()}}
                    <div class="layui-form-item">
                        <label class="layui-form-label">上级栏目</label>
                        <div class="layui-input-block">
                            <select name="pid" lay-verify="required">
                                <option value="0">一级栏目</option>
								@foreach($category as $v)
									@if($v['id'] == $item['pid'])
										<option value="{{ $item['id'] }}" selected="selected">@if($v['level'] == 0){{ $v['name'] }}@else | @for($i=0;$i<$v['level'];$i++) ---- @endfor {{ $v['name'] }} @endif</option>
									@else
										<option value="$v['id']">@if($v['level'] == 0){{ $v['name'] }}@else | @for($i=0;$i<$v['level'];$i++) ---- @endfor {{ $v['name'] }} @endif</option>
									@endif
								@endforeach
							</select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">栏目名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" value="{{ $item['name'] }}" required="" lay-verify="required" placeholder="请输入栏目名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">别名</label>
                        <div class="layui-input-block">
                            <input type="text" name="alias" value="{{ $v['alias'] }}" placeholder="（选填）请输入栏目别名" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">图标</label>
                        <div class="layui-input-block">
                            <input type="text" name="icon" value="{{ $v['icon'] }}" placeholder="（选填）如：fa fa-home" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">缩略图</label>
                        <div class="layui-input-block">
							@if($item['picture'] == null)
								<input type="file" name="picture">
							@else
								已有缩略图：<input type="text" name="" value="{{ $item['picture'] }}" placeholder="（选填）如：fa fa-home" class="layui-input">
								替换：<input type="file" name="picture">
							@endif
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">内容</label>
                        <div class="layui-input-block">
							<script id="container" name="content" type="text/plain" >{!!$item['content']!!}</script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">类型</label>
                        <div class="layui-input-block">
                            <select name="type" lay-verify="required">
                                <option value="1" @if($item['type'] == 1)selected="selected"@endif >列表</option>
                                <option value="2" @if($item['type'] == 2)selected="selected"@endif>单页</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-block">
                            <input type="text" name="sort" value="{{ $item['sort'] }}" required="" lay-verify="required" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">列表模板</label>
                        <div class="layui-input-block">
                            <input type="text" name="list_template" value="{{ $item['list_template'] }}" placeholder="（选填）请输入模板文件名" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">详情模板</label>
                        <div class="layui-input-block">
                            <input type="text" name="detail_template" value="{{ $item['detail_template	'] }}" placeholder="（选填）请输入模板文件名" class="layui-input">
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
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>