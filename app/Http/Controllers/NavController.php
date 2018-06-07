<?php

namespace App\Http\Controllers;

use App\Nav;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index()
    {
		$nav = new Nav;
		$navs = $nav->find_all();
		return view('nav.index',['navs'=>$navs]);
    }

	public function create(){
		$nav = new Nav;
		$navs = $nav->find_all();
		return view('nav.add',['navs'=>$navs]);
	}

	public function store(Request $request){
		//验证数据
		 $this->validate($request, [
				'pid' => 'required|integer',
				'name' => 'required|string|max:255',
				'alias' => 'nullable|string|max:255',
				'link' => 'nullable|string|max:255',
				'icon' => 'nullable|string|max:255',
				'status' => 'required|integer|max:5',
				'target' => 'required|integer|max:5',
				'sort' => 'required|integer',
		 ]);
		 //插入到数据库
		 $store = Nav::create([
						'pid' => "$request->pid",
						'name' => "$request->name",
						'alias' => "$request->alias",
						'link' => "$request->link",
						'icon' => "$request->icon",
						'status' => "$request->status",
						'target' => "$request->target",
						'sort' => "$request->sort",
	     ]);
		 if($store){
			 return response()->json(['code'=>1,'msg'=>'添加导航成功','url'=>route('nav.index')]);
		 }else{
			 return response()->json(['msg'=>'添加失败']);
		 }
	}
	
	public function edit($id){
		$nav = new Nav;
		$navs = $nav->find_all();
		$item = $nav->find($id);
		return view('nav.edit',['navs'=>$navs,'item'=>$item]);
	}

	public function update(Request $request,$id){
		$this->validate($request, [
				'pid' => 'required|integer',
				'name' => 'required|string|max:255',
				'alias' => 'nullable|string|max:255',
				'link' => 'nullable|string|max:255',
				'icon' => 'nullable|string|max:255',
				'status' => 'required|integer|max:5',
				'target' => 'required|integer|max:5',
				'sort' => 'required|integer',
		]);
		$update = Nav::where('id',$id)->update([
			'pid' => "$request->pid",
			'name' => "$request->name",
			'alias' => "$request->alias",
			'link' => "$request->link",
			'icon' => "$request->icon",
			'status' => "$request->status",
			'target' => "$request->target",
			'sort' => "$request->sort",
		]);
		if($update){
			return response()->json(['code'=>1,'msg'=>'更新成功','url'=>route('nav.edit',['id'=>$id])]);
		}else{
			return response()->json(['msg'=>'更新失败']);
		}
	}

	public function show($id){
		$nav = new Nav;
		$navs = $nav->find_all();
		$item = $nav->find($id);
		return view('nav.add',['navs'=>$navs,'item'=>$item]);
	}

	public function destroy($id){
		$nav = new Nav;
		$navs = $nav->find_all($id);
		foreach($navs as $v){
			$nav->destroy($v['id']);
		}
		if($nav->destroy($id)){
			return response()->json(['code'=>1,'msg'=>'删除成功','url'=>route('nav.index')]);
		}else{
			return response()->json(['msg'=>'删除失败']);
		};
	}



}
