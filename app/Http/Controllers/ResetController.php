<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetController extends Controller
{
    public function index()
    {
        return view('auth.reset');
    }

	public function update(Request $request,$id){
		$this->validate($request, [
			'old_password' =>'required',
			'password' => 'required|min:6',
			'confirm_password' => 'required|same:password',
		]);

		$user = Admin::find($id);
		if(Hash::check($request->old_password, $user->password)){
			if($request->password == $request->confirm_password){
				$password = bcrypt($request->password);//加密密码
				if(Admin::where('id',$id)->update(['password'=>$password])){
					return response()->json(['code'=>1,'url'=>route('login'),'msg'=>'修改成功！请重新登录']);//更换密码后重新登陆
				}else{
					return response()->json(['msg'=>'保存密码失败']);
				};				
			}else{
				return response()->json(['msg'=>'两次密码不一致']);
			}			
		}
		return response()->json(['msg'=>'输入的原密码错误']);
		
		 
	}

}
