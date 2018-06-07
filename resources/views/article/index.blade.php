@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">文章管理</li>
            <li class=""><a href="{{ route('article.create') }}">添加文章</a></li>
        </ul>
        <div class="layui-tab-content">

            <form class="layui-form layui-form-pane" action="{{ route('article.index') }}" method="get">
                <div class="layui-inline">
                    <label class="layui-form-label">分类</label>
                    <div class="layui-input-inline">
                        <select name="cid">
							<option value="0" >全部</option>
							@foreach($cate as $v)
							<option value="{{ $v['id'] }}" @if($v['id'] == $cid)selected="selected" @endif>@if($v['level']!==0)|@endif @for($i=0;$i<$v['level'];$i++)---- @endfor{{ $v['name'] }}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">关键词</label>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="请输入关键词" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn">搜索</button>
                </div>
            </form>
            <hr>

            <form action="" method="post" class="ajax-form">
                <button type="button" class="layui-btn layui-btn-small ajax-action" data-action="{{ route('article.update',['id'=>0]) }}">审核</button>
                <button type="button" class="layui-btn layui-btn-warm layui-btn-small ajax-action" data-action="{{ route('article.update',['id'=>-1]) }}">取消审核</button>
                <button type="button" class="layui-btn layui-btn-danger layui-btn-small ajax-destory" data-action="{{ route('article.destroy',['id'=>0]) }}">删除</button>
                <div class="layui-tab-item layui-show">
                    <table class="layui-table">
						<thead>
                        <tr>
                            <th style="width: 15px;"><input type="checkbox" class="check-all"></th>
                            <th style="width: 30px;">ID</th>
                            <th style="width: 30px;">排序</th>
                            <th>标题</th>
                            <th>栏目</th>
                            <th>作者</th>
                            <th>阅读量</th>
                            <th>状态</th>
                            <th>发布时间</th>
                            <th>操作</th>
                        </tr>
						</head>
						<tbody>
						@foreach($articles as $v)
						<tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $v['id'] }}"></td>
                            <td>{{ $v['id'] }}</td>
                            <td>{{ $v['sort'] }}</td>
                            <td>{{ $v['title'] }}</td>
                            <td>{{ $v['name'] }}</td>
                            <td>@if($v['author']!==null){{ $v['author'] }}@else未填写@endif</td>
                            <td>{{ $v['read'] }}</td>
                            <td>@if($v['status']==0)未审核@else已审核@endif</td>
                            <td>{{ $v['created_at'] }}</td>
                            <td>
                                <a href="{{ route('article.edit',['id'=>$v['id']]) }}" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
                                <a href="{{ route('article.destroy',['id'=>$v['id']]) }}" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
                            </td>
                        </tr>
						@endforeach
						</tbody>
                    </table>
                    <!--分页-->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
