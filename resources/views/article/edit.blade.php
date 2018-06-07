@include('UEditor::head')
@extends('layouts.admin')
@section('body')
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class=""><a href="{{ route('article.index') }}">文章管理</a></li>
            <li class=""><a href="{{ route('article.create') }}">添加文章</a></li>
            <li class="layui-this">编辑文章</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="{{ route('article.update',['id'=>$article['id']]) }}" method="post">
					{{ method_field('PUT') }}
					{{ csrf_field() }}
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属栏目</label>
                        <div class="layui-input-block">
                            <select name="cid" lay-verify="required">
								@foreach($cate as $c)
									<option @if($c['id'] == $article['cid'])selected="selected" @endif value="{{ $c['id']}}">@if($c['level']!==0)| @endif @for($i=0;$i<$c['level'];$i++)----@endfor{{ $c['name'] }}</option>
								@endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" value="{{ $article['title'] }}" required  lay-verify="required" placeholder="请输入标题" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">作者</label>
                        <div class="layui-input-block">
                            <input type="text" name="author" value="{{ $article['author'] }}" placeholder="（选填）请输入作者" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">简介</label>
                        <div class="layui-input-block">
                            <textarea name="introduction" placeholder="（选填）请输入简介" class="layui-textarea">{{ $article['introduction'] }}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">内容</label>
                        <div class="layui-input-block">
                            <script id="container" name="content" type="text/plain" >{!! $article['content'] !!}</script>
                        </div>
                    </div>
                     <div class="layui-form-item">
                        <label class="layui-form-label">缩略图</label>
                        <div class="layui-input-block">
                            <input type="text" name="picture" value="{{ $article['picture'] }}"  class="layui-input layui-input-inline" style="height:38px;background:#fff;" id="thumb">
                            <input type="file" name="picture" 
							class="layui-upload-file">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="status" value="1" title="已审核" @if($article['status'] == 1)checked="checked"@endif>
                            <input type="radio" name="status" value="0" title="未审核"
							@if($article['status'] == 0)checked="checked"@endif>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">置顶</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_top" value="1" title="置顶"
							@if($article['is_top'] == 1)checked="checked"@endif >
                            <input type="radio" name="is_top" value="0" title="未置顶" @if($article['is_top'] == 0)checked="checked"@endif >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">推荐</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_recommend" value="1" title="推荐" @if($article['is_recommend'] == 1)checked="checked"@endif>
                            <input type="radio" name="is_recommend" value="0" title="未推荐" @if($article['is_recommend'] == 0)checked="checked"@endif>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">发布时间</label>
                        <div class="layui-input-block">
                            <input type="text" name="created_at" value="{{ $article['created_at'] }}" class="layui-input datetime">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-block">
                            <input type="text" name="sort" value="{{ $article['sort'] }}" required  lay-verify="required" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button lay-submit class="layui-btn"  lay-filter="*">更新</button>
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