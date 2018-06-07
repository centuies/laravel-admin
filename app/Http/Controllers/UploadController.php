<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
	public function __invoke(Request $request)
    {
         if ($request->hasFile('picture')){
				 $this->validate($request, [
					'picture' => 'required|image|max:2048',
				]);
				 //将图片存贮至storage/app/temp
				 $path = $request->picture->store("pictures/".date('ymd'));
				 return response()->json(['error' => 0,'url' => $path]);
			 }else{
				 return response()->json(['message' => '上传失败']);
			 }
		}
    }
