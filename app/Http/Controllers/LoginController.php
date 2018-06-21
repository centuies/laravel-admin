<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class LoginController extends Controller
{

	public function showLoginForm(){
		if (Auth::check()) {
			return redirect('/home');
		}
		return view('auth.login');
	}

	public function login(Request $request){
		$admin = Admin::where('name',$request->name)->first();
		if($admin && Hash::check($request->password, $admin->password)){
			if($admin->status == 1){
				$admin->last_login = date('Y-m-d H:i:s');//更新最后登录时间
				$admin->ip_address = $_SERVER["REMOTE_ADDR"];//更新最后登录ip
				$admin->save();
				if(!Auth::login($admin)){
					return response()->json(['code'=>1,'msg'=>'登录成功','url'=>route('home')]);
				};
				return response()->json(['msg'=>'登录失败']);
				
			}else{
				return response()->json(['msg'=>'当前用户已禁用']);
			}
		}
			return response()->json(['msg'=>'用户名或密码错误']);
		
	}

	public function logout(Request $request){
		$request->session()->flush();//删除所有session
		Auth::logout();
		return redirect('/login');
	}
}
