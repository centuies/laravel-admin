<?php

namespace App\Http\Controllers;

use App\SiteConfig;
use Illuminate\Http\Request;

class SiteConfigController extends Controller
{

    public function index()
    {
		$config = SiteConfig::find(1);
		return view('siteconfig.index',['config'=>$config]);
    }

	public function store(Request $request)
	{
		$this->validate($request, [
			'website_title' => 'string|nullable|max:255',
			'seo_title' => 'string|nullable|max:255',
			'seo_keywords' => 'string|nullable|max:255',
			'seo_description' => 'string|nullable',
			'info' => 'string|nullable|max:255',
			'icp_number' => 'string|nullable|max:255',
		]);
		$config = SiteConfig::where('id',1)->update([
			'website_title'	=> $request->input('website_title'),
			'seo_title'	=> $request->input('seo_title'),
			'seo_keywords'	=> $request->input('seo_keywords'),
			'seo_description'	=> $request->input('seo_description'),
			'info'	=> $request->input('info'),
			'icp_number' => $request->input('icp_number'),
		]);
		if($config){
			return response()->json(['code'=>1,'url'=>route('siteconfig.index'),'msg'=>'保存成功']);
		}else{
			return response()->json(['msg'=>'保存失败']);
		}

	}

}
