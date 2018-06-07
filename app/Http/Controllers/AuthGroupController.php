<?php

namespace App\Http\Controllers;

use Validator;
use App\Authgroup;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$authgroup = Authgroup::all();
        return view('authgroup.index',['authgroup'=>$authgroup]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('authgroup.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		Validator::make($request->all(), [
			'name' => 'required|unique:auth_group|max:255',
			'status' => 'required|digits:1|max:1',
		])->validate();

		$create = Authgroup::create([
			'name' => $request->name,
			'status' => $request->status,
		]);

		if($create){
			return response()->json(['code'=>1,'url'=>route('authgroup.index'),'msg'=>'添加成功']);
		}else{
			return response()->json(['msg'=>'删除失败']);
		}
		return redirect()->route('authgroup.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Authgroup  $authgroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		return view('authgroup.show',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Authgroup  $authgroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$authgroup = Authgroup::find($id);
		return view('authgroup.edit',['authgroup'=>$authgroup]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Authgroup  $authgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		Validator::make($request->all(), [
			'name' => [
				'required','max:255',
				Rule::unique('auth_group')->ignore($id),
			],
			'status' => 'required|digits:1|max:1',
		])->validate();

		$update = Authgroup::where('id',$id)->update([
			'name' => $request->name,
			'status' => $request->status,
		]);

		if($update){
			return response()->json(['code'=>1,'url'=>route('authgroup.edit',['id'=>$id]),'msg'=>'更新成功']);
		}else{
			return response()->json(['msg'=>'更新失败']);
		}
		return redirect()->route('authgroup.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Authgroup  $authgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$delete = Authgroup::destroy($id);
		if($delete){
			return response()->json(['code'=>1,'url'=>route('authgroup.index'),'msg'=>'删除成功']);
		}else{
			return response()->json(['msg'=>'删除失败']);
		}
		return redirect()->route('authgroup.index');
    }
	
	/**
     * 用js提交请求。获取权限组拥有的权限。
     */
	public function getauth(Request $request){
		 $authgroup = Authgroup::find($request->id);
		 $auth = explode(',', $authgroup['auth']);
		 $m = new menu;
		 $menus = $m->msort();
		 foreach($menus as $key => $value){
			 if(in_array($value['id'],$auth)){
				 $menus[$key]['checked'] = true;
			 }
		 }
		 return response()->json($menus);
	}
	
	//更新权限
	public function updateauth(Request $request){
		$id = $request->id;

		$auth = is_array($request->auth_rule_ids)?implode(',',$request->auth_rule_ids):'';

		$update = Authgroup::where('id',$id)->update([
			'auth' => $auth,
		]);

		if($update){
			return response()->json(['code'=>1,'url'=>route('authgroup.show',['id'=>$id]),'msg'=>'授权成功']);
		}else{
			return response()->json(['msg'=>'授权失败']);
		}
		return redirect()->route('authgroup.show',['id'=>$id]);
	}

	
}
