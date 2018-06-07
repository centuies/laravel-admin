<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
		$MenuModel = new Menu;
		$menu = $MenuModel->msort();
        return view('menu.index',['menu'=>$menu]);
    }

	public function create(){
		$MenuModel = new Menu;
		$menu = $MenuModel->msort();		
		return view('menu.add',['menu'=>$menu]);
	}

	public function store(Request $request){
		$this->validate($request, [
			'pid' => 'required|integer',
			'menu_name' => 'required|string|max:255',
			'route' => 'max:255',
			'icon' => 'max:255',
			'status' => 'integer|max:2',
			'menu_sort' => 'integer'
		]);

		 $menu = Menu::create([
			 'pid' => $request->pid,
			 'menu_name' => $request->menu_name,
			 'route' => $request->route,
			 'icon' => $request->icon,
		     'status' => $request->status,
			 'menu_sort' => $request->menu_sort,
		 ]);
		 if($menu){
			 return response()->json(['code'=>1,'url'=>route('menu.index'),'msg'=>'保存成功']);
		 }
		 return response()->json(['msg'=>'保存失败']);
		 
	}


	public function edit($id){
		$MenuModel = new Menu;
		$menu = $MenuModel->find($id);
		$menus = $MenuModel->msort();
		return view('menu.edit',['menu'=>$menu,'menus'=>$menus]);
	}

	public function update(Request $request,$id){
		$this->validate($request, [
			'pid' => 'required|integer',
			'menu_name' => 'required|string|max:255',
			'route' => 'max:255',
			'icon' => 'max:255',
			'status' => 'integer|max:4',
			'menu_sort' => 'integer'
		]);
		$update = Menu::where('id',$id)
						->update([
							'pid' => $request['pid'],
							'menu_name' => $request['menu_name'],
							'route' => $request['route'],
							'icon' => $request['icon'],
							'status' => $request['status'],
							'menu_sort' => $request['menu_sort'],
						]);
		
		if($update){
			return response()->json(['code'=>1,'url'=>route('menu.edit',['id'=>$id]),'msg'=>'更新成功']);
		}else{
			return response()->json(['msg'=>'更新失败']);
		}
	}

	public function destroy($id){
		$MenuModel = new Menu;
		$children = $MenuModel->msort($id);
		if($children){
			foreach($children as $child){
				$MenuModel->destroy($child['id']);
			}
		}
		$delete = $MenuModel->destroy($id);
		if($delete){
			return response()->json(['code'=>1,'msg'=>'删除成功','url'=>route('menu.index')]);
		}else{
			return response()->json(['msg'=>'删除失败']);
		}
	}
	
	//添加子菜单。
	public function show($id){
		$MenuModel = new Menu;
		$menu = $MenuModel->msort();
		$item = $MenuModel->find($id);
		return view('menu.add',['menu'=>$menu,'item'=>$item]);
	}


}
