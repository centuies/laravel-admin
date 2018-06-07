<?php

namespace App\Http\Controllers;

use App\Slide;
use App\SlideCategory;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$slide = Slide::orderBy('sort','desc')->get();
		foreach($slide as $s){
			$s['category'] = $s->cate->name;
		}
		return view('slide.index',['slide'=>$slide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$category = SlideCategory::select('id','name')->get();
		return view('slide.add',['category'=>$category]);
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
			 'cid' => 'required|integer|digits_between:1,10',
			 'name' => 'required|string|max:255',
			 'description' => 'nullable|string',
			 'image' => 'nullable|string|max:255',
			 'link' => 'nullable|url|max:255',
			 'target' => 'required|alpha_dash|max:6',
			 'status' => 'required|integer|min:0|max:1',
			 'sort' => 'required|integer|digits_between:0,11',
		]);

		 $store = Slide::create([
			 'cid' => $request->cid,
			 'name' => $request->name,
			 'description' => $request->description,
			 'image' => $request->image,
			 'link' => $request->link,
			 'target' => $request->target,
			 'status' => $request->status,
			 'sort' => $request->sort,
		 ]);

		 if($store){
			 return response()->json(['code'=>1,'url'=>route('slide.index'),'msg'=>'添加轮播图成功']);
		 }else{
			 return response()->json(['msg'=>'添加轮播图失败']);
		 }
		 return redirect()->route('slide.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$category = SlideCategory::select('id','name')->get();
		$slide = Slide::find($id);
		return view('slide.edit',['category'=>$category,'slide'=>$slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		$this->validate($request, [
			 'cid' => 'required|integer|digits_between:1,10',
			 'name' => 'required|string|max:255',
			 'description' => 'nullable|string',
			 'image' => 'nullable|string|max:255',
			 'link' => 'nullable|url|max:255',
			 'target' => 'required|alpha_dash|max:6',
			 'status' => 'required|integer|min:0|max:1',
			 'sort' => 'required|integer|digits_between:0,11',
		]);

		$update = Slide::where('id',$id)->update([
			'cid' => $request->cid,
			'name' => $request->name,
			'description' => $request->description,
			'image' => $request->image,
			'link' => $request->link,
			'target' => $request->target,
			'status' => $request->status,
			'sort' => $request->sort,
		]);

		if($update){
			return response()->json(['code'=>1,'url'=>route('slide.edit',['id'=>$id]),'msg'=>'更新成功']);
		}else{
			return response()->json(['msg'=>'更新失败']);
		}
		return redirect()->route('slide.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$delete = Slide::destroy($id);
		if($delete){
			return response()->json(['code'=>1,'url'=>route('slide.index'),'msg'=>'删除成功']);
		}else{
			return response()->json(['msg'=>'删除失败']);
		}
		return redirect()->route('slide.index');
    }
}
