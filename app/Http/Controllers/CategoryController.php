<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Category $cate)
    {
		$category = $cate->findAll();
		return view('category.index',['category'=>$category]);
    }

	public function create(Category $cate){
		$category = $cate->findAll();
		return view('category.add',['category'=>$category]);
	}

	public function store(Request $request){
		$this->validate($request, [
			'pid' => 'required|integer',
			'name' => 'required|string|max:255',
			'alias' => 'nullable|string|max:255',
			'icon' => 'nullable|string|max:255',
			'picture' => 'nullable|string|max:255',
			'content' => 'nullable|string',
			'type' => 'required|integer|max:3',
			'list_template' => 'nullable|string|max:255',
			'detail_template' => 'nullable|string|max:255',
			'sort' => 'integer|max:99999999999',
		]);
		$insert = Category::create([
				'pid' => $request->pid,
				'name' => $request->name,
				'alias' => $request->alias,
				'icon' => $request->icon,
				'picture' => $request->picture,
				'content' => $request->content,
				'type' => $request->type,
				'list_template' => $request->list_template,
				'detail_template' => $request->detail_template,
				'sort' => $request->sort,
		]);
		if($insert){
			return response()->json(['code'=>1,'msg'=>'添加栏目成功','url'=>route('category.index')]);
		}else{
			return response()->json(['msg'=>'添加栏目失败']);
		}
	}

	public function edit(Category $cate,$id){
		$category = $cate->findAll();
		$item = $cate->find($id);
		return view('category.edit',['category'=>$category,'item'=>$item]);
	}

	public function update(Request $request,$id){
		$category = Category::find($id);
		$this->validate($request, [
			'pid' => 'required|integer',
			'name' => 'required|string|max:255',
			'alias' => 'nullable|string|max:255',
			'icon' => 'nullable|string|max:255',
			'picture' => 'file|image',
			'content' => 'nullable|string',
			'type' => 'required|integer|max:3',
			'list_template' => 'nullable|string|max:255',
			'detail_template' => 'nullable|string|max:255',
			'sort' => 'integer|max:99999999999',
		]);	

		if ($request->hasFile('picture')){			
			$path = $request->picture->store('pictures');
			Storage::delete($category['picture']);
		}

		$update = Category::where('id',$id)->update([
				'pid' => $request->pid,
				'name' => $request->name,
				'alias' => $request->alias,
				'icon' => $request->icon,
				'picture' => isset($path)?$path:$category['file'],
				'content' => $request->content,
				'type' => $request->type,
				'list_template' => $request->list_template,
				'detail_template' => $request->detail_template,
				'sort' => $request->sort,
		]);
		if($update){
			return response()->json(['code'=>1,'msg'=>'更新成功','url'=>route('category.edit',['id'=>$id])]);
		}else{
			return response()->json(['msg'=>'更新失败']);
		}

	}

	public function show(Category $cate,$id){
		$category = $cate->findAll();
		$item = Category::find($id);
		return view('category.add',['category'=>$category,'item'=>$item]);
	}

	public function destroy(Category $cate,$id){
		$children = $cate->findAll($id);
		if($children){
			foreach($children as $v){
				$cate->destroy($v['id']);
			}
		}
		$result = $cate->destroy($id);
		if($result){
			return response()->json(['code'=>1,'msg'=>'删除成功','url'=>route('category.index')]);
		}else{
			return response()->json(['msg'=>'删除失败']);
		}
	}




}
