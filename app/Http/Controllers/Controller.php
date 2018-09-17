<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

class Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct(){
		//获取请求控制器，分配到视图。使后台菜单选中
		$route = \Route::currentRouteName();
		$temp = explode('.',$route);
		$controller = $temp[0];
		View::share('controller',$controller.'/');
	}
}
