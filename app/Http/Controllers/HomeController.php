<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config  = [
            'url'             => $_SERVER['HTTP_HOST'],
            'document_root'   => $_SERVER['DOCUMENT_ROOT'],
            'server_os'       => PHP_OS,
            'server_port'     => $_SERVER['SERVER_PORT'],
            'server_soft'     => $_SERVER['SERVER_SOFTWARE'],
            'php_version'     => PHP_VERSION,
            'max_upload_size' => ini_get('upload_max_filesize')
        ];
        return view('home.index',['config'=>$config]);
    }

	public function clear(){
		//清除缓存
		if (Cache::flush()){
			return response()->json(['code'=>1,'msg'=>'清除缓存成功']);
		}else{
			return response()->json(['msg'=>'清除缓存失败']);
		}
	}


}
