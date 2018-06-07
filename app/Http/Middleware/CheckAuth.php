<?php

namespace App\Http\Middleware;

use Closure;
use App\Authgroup;
use App\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		if(Auth::check()){
			//获取权限组的id
			$group_id = $request->user()->auth_group;
			//获取权限组的权限
			$auth = Authgroup::where('id',$group_id)->value('auth');
			$id_array = explode(",",$auth);
			//获取请求控制器，分配到视图。使后台菜单选中			
			@$route = \Route::currentRouteName();
			@list($controller,$method) = explode('.',$route);
			@View::share('controller',$controller.'/');
			//根据请求路由查找菜单id
			$menu_id = Menu::where('route',$route)->value('id');
			//如果id在权限组中，允许操作
			if(in_array($menu_id,$id_array)){
				return $next($request);
			}
			return response()->json(['msg'=>'没有权限']);
			
		};
		return redirect('login');
		

     
    }
}
