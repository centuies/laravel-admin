<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * 文章列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$cid = $request->cid?$request->cid:0;
		$keyword = $request->keyword?$request->keyword:'';
		$category = new Category;
		$cate = $category->findAll();
		if($cid == 0){
			$articles = Article::orderBy('sort','desc')->where('title', 'like', "%$keyword%")->get();
		}else{
			$articles = Article::where('cid',$cid)->where('title', 'like', "%$keyword%")->orderBy('sort','desc')->get();
		}
		foreach($articles as $article){
			@$article['name'] = $article->category->name;//查找文章所属栏目
		}
		return view('article.index',['articles'=>$articles,'cate' => $cate,'cid'=>$cid,'keyword'=>$keyword]);
    }

    /**
     * 文章添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$category = new Category;
		$cate = $category->findAll();
		return view('article.add',['cate'=>$cate]);
    }

    /**
     * 文章保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'cid' => 'required|integer',
			'title' => 'required|string|max:255',
			'author' => 'nullable|string|max:255',
			'introduction' => 'nullable|string|max:1000',
			'content' => 'nullable|string',
			'picture' => 'nullable|string|max:255',
			'status' => 'required|integer|max:1',
			'is_top' => 'required|integer|max:1',
			'is_recommend' => 'required|integer|max:1',
			'sort' => 'required|integer|max:99999999999',
			'created_at' =>"nullable|date",
		]);

		$create = Article::create([
					'cid' => $request->cid,
					'title' => $request->title,
					'author' => $request->author,
					'introduction' => $request->introduction,
					'content' => $request->content,
					'picture' => $request->picture,
					'status' => $request->status,
					'is_top' => $request->is_top,
					'is_recommend' => $request->is_recommend,
					'sort' => $request->sort,
					'created_at' => $request->created_at,
		]);
		
		if($create){
			$info = ['code'=>1,'url'=>route('article.index'),'msg'=>'添加成功'];
		}else{
			$info = ['msg'=>'添加失败'];
		}
		return response()->json($info);
		return view('article.index');
    }

	/**
     * 文章编辑页面
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$category = new Category;
		$cate = $category->findAll();//找出所有栏目
		$article = Article::find($id);//找出文章
        return view('article.edit',['cate'=>$cate,'article'=>$article]);
    }

	/**
     * 文章更新
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		//id等于0和-1表示文章审核和取消审核
		if($id == 0){
			//文章审核
			foreach($request->ids as $i){
				$update = Article::where('id',$i)->update([
					'status' => 1,
				]);
			}
		}elseif($id == -1){
			//取消文章审核
			foreach($request->ids as $i){
				$update = Article::where('id',$i)->update([
					'status' => 0,
				]);
			}
		}else{
			$this->validate($request, [
				'cid' => 'required|integer',
				'title' => 'required|string|max:255',
				'author' => 'nullable|string|max:255',
				'introduction' => 'nullable|string|max:1000',
				'content' => 'nullable|string',
				'picture' => 'nullable|string|max:255',
				'status' => 'required|integer|max:1',
				'is_top' => 'required|integer|max:1',
				'is_recommend' => 'required|integer|max:1',
				'sort' => 'required|integer|max:99999999999',
				'created_at' =>"nullable|date",
			]);
			$article = Article::find($id);
			if($article['picture'] !== $request->picture){
				//如果上传了新的文件，则删除旧文件
				Storage::delete($article['picture']);
			}
			//更新文章
			$update = Article::where('id',$id)->update([
				'cid' => $request->cid,
				'title' => $request->title,
				'author' => $request->author,
				'introduction' => $request->introduction,
				'content' => $request->content,
				'picture' => $request->picture,
				'status' => $request->status,
				'is_top' => $request->is_top,
				'is_recommend' => $request->is_recommend,
				'sort' => $request->sort,
				'created_at' => $request->created_at,
			]);
		}
		if($update){
			if($id==0 || $id==-1){
				//审核或取消审核都刷新首页
				return response()->json(['code'=>1,'url'=>route('article.index'),'msg'=>'更新成功']);
			}else{
				//更新成功时停留在编辑页面
				return response()->json(['code'=>1,'url'=>route('article.edit',['id'=>$id]),'msg'=>'更新成功']);
			}
		}else{
			return response()->json(['msg'=>'更新失败']);
		}
    }

	/**
     * 文章删除
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
		//如果是首页的多个删除，则逐个删除。
		if($id == 0){
			foreach($request->ids as $id){
				//查找文章,如果有图片，则删除图片
				$article = Article::find($id);
				if($article->picture){
					Storage::delete($article->picture);
				}
				$delete = Article::destroy($id);
			}
		}else{
			//查找文章,如果有图片，则删除图片
			$article = Article::find($id);
			if($article->picture){
				Storage::delete($article->picture);
			}
			$delete = Article::destroy($id);
		}
		if($delete){
			$info = [
				'code' => 1,
				'url' => route('article.index'),
				'msg' => '删除成功'
			];
		}else{
			$info = [
				'code' => 0,
				'msg' => '删除失败'
			];
		}
		return response()->json($info);		
    }
}
