<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		if(!empty($request->keyword)){			
			$keyword = $request->keyword;
			$users = User::where('name', 'like', '%'.$keyword.'%')->get();
			return view('user.index',['users'=>$users,'keyword'=>$keyword]);
			exit();
		};

		$users = User::all();
        return view('user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'name' => 'alpha|required||unique:users|max:255',
			'password' => 'alpha_dash|required|max:255|min:6',
			'repeat_password' => 'alpha_dash|required|same:password|max:255|min:6',
			'status' => 'required|numeric|max:3',
			'email' => 'nullable|email|string|max:255',
			'phone' => 'nullable|integer|digits:11',
		]);

		$create = User::create([
			'name' => $request->name,
			'password' => bcrypt($request->password),
			'status' => $request->status,
			'email' => $request-> email,
			'phone' => $request->phone,
		]);
		if($create){
			return response()->json(['code'=>1,'url'=>route('user.index'),'msg'=>('添加用户成功！')]);
		}else{
			return response()->json(['msg'=>('添加用户失败！')]);
		}
		return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Normaluser  $normaluser
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Normaluser  $normaluser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$user = User::find($id);
		return view('user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Normaluser  $normaluser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		//验证字段
		Validator::make($request->all(), [
			'name' => [
				'required','max:255','alpha',
				Rule::unique('users')->ignore($id),
			],
			'password' => ['alpha_dash','nullable','max:255','min:6'],
			'repeat_password' => ['alpha_dash','nullable','same:password','max:255','min:6'],
			'status' => ['required','numeric','max:3'],
			'email' => [
				'nullable','email','string','max:255',
				Rule::unique('users')->ignore($id),
			],
			'phone' => [
				'nullable','integer','digits:11',
				Rule::unique('users')->ignore($id),				
			],
		])->validate();

		if(empty($request->password)){
			$update = User::where('id',$id)->update([
				'name'=> $request->name,
				'status' => $request->status,
				'email' => $request->email,
				'phone' => $request->phone,
			]);
		}else{
			$update = User::where('id',$id)->update([
				'name'=> $request->name,
				'password' => bcrypt($request->password),
				'status' => $request->status,
				'email' => $request->email,
				'phone' => $request->phone,
			]);
		}
		if($update){
			return response()->json(['code'=>1,'url'=>route('user.edit',['id'=>$id]),'msg'=>'修改成功']);
		}else{
			return response()->json(['msg'=>'修改失败']);
		}
		return redirect()->route('user.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Normaluser  $normaluser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$delete = User::destroy($id);
		if($delete){
			return response()->json(['code'=>1,'msg'=>'删除成功','url'=>route('user.index')]);
		}else{
			return response()->json(['msg'=>'删除失败']);
		}
		return redirect()->route('user.index');
    }
}
