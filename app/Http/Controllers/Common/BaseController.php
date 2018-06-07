<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Menu;

class BaseController extends Controller
{
	protected $user;
	 protected function __construct()
    {
		//$this->checkauth();
		$this->middleware(function ($request, $next) {
			$this->user = $request->user();
			return $next($request);
		});
		dd($this->user);
    }

	protected function checkauth(){

		$route = \Route::currentRouteName();
		if($route){
			$menu_id = Menu::where('route',$route)->value('id');
		}
	}
}
