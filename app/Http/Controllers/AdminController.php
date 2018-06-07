<?php

namespace App\Http\Controllers;

use Validator;
use App\Admin;
use App\Authgroup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$admins = Admin::all();
		return view('admin.index',['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$auth = Authgroup::all();
		return view('admin.add',['auth'=>$auth->toArray()]);
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
			'name' => 'required|alpha_dash|unique:admins|max:255',
			'password' => 'required|min:6|max:255|alpha_dash',
			'repeat_password' => 'required|min:6|max:255|alpha_dash|same:password',
			'status' => 'required|numeric|max:1',
			'auth_group' => 'required|numeric|digits_between:1,10',
		])->validate();

		$store = Admin::create([
			'name' => $request->name,
			'password' => bcrypt($request->password),
			'status' => $request->status,
			'auth_group' => $request->auth_group,
		]);
		if($store){
			return response()->json(['code'=>1,'url'=>route('admin.index'),'msg'=>'添加管理员成功']);
		}else{
			return response()->json(['msg'=>'添加管理员失败']);
		}
		return redirect()->route('admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$admin = Admin::find($id);
		$authgroup = Authgroup::all();
		return view('admin.edit',['admin'=>$admin,'authgroup'=>$authgroup]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		Validator::make($request->all(), [
			'name' => [
				'required','alpha_dash','max:255',
				Rule::unique('admins')->ignore($id)
			],					
			'password' => 'nullable|min:6|max:255|alpha_dash',
			'repeat_password' => 'nullable|min:6|max:255|alpha_dash|same:password',
			'status' => 'required|numeric|max:1',
			'auth_group' => 'required|numeric|digits_between:1,10',
		])->validate();
		if(empty($request->password)){
			$update = Admin::where('id',$id)->update([
				'name' => $request->name,
				'status' => $request->status,
				'auth_group' => $request->auth_group,
			]);
		}else{
			$update = Admin::where('id',$id)->update([
				'name' => $request->name,
				'password' => bcrypt($request->password),
				'status' => $request->status,
				'auth_group' => $request->auth_group,
			]);
		}
		if($update){
			return response()->json(['code'=>1,'url'=>route('admin.edit',['id'=>$id]),'msg'=>'修改成功']);
		}else{
			response()->json(['msg'=>'修改失败']);
		}
		return redirect()->route('admin.edit',['id'=>$id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adminuser  $adminuser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$delete = Admin::destroy($id);
		if($delete){
			return response()->json(['code'=>1,'url'=>route('admin.index'),'msg'=>'删除成功']);
		}else{
			return response()->json(['msg'=>'删除失败']);
		}
		return redirect()->route('admin.index');
    }
}
