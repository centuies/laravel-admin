<?php

namespace App\Http\Controllers;

use App\SlideCategory;
use Illuminate\Http\Request;

class SlideCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$category = SlideCategory::all();
		return view('slide_category.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('slide_category.add');
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
			'name' => 'required|unique:slide_category|max:255',
		]);

		$store = SlideCategory::create(['name'=>$request->name]);
		if($store){
			return response()->json(['code'=>1,'url'=>route('slide_category.index'),'msg'=>'添加成功']);
		}else{
			return response()->json(['msg'=>'添加失败']);
		}
		return redirect()->route('slide_category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SlideCategory  $slideCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$item = SlideCategory::find($id);
		return view('slide_category.edit',['item'=>$item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SlideCategory  $slideCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		$this->validate($request, [
			'name' => 'required|unique:slide_category|max:255',
		]);
		$update = SlideCategory::where('id',$id)->update(['name'=>$request->name]);
		if($update){
			return response()->json(['code'=>1,'url'=>route('slide_category.edit',['id'=>$id]),'msg'=>'更新成功']);
		}else{
			return response()->json(['msg'=>'更新失败']);
		}
		return redirect()->route('slide_category.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SlideCategory  $slideCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$delete = SlideCategory::destroy($id);
		if($delete){
			return response()->json(['code'=>1,'url'=>route('slide_category.index'),'msg'=>'删除成功']);
		}else{
			return response()->json(['msg'=>'删除失败']);
		}
		return redirect()->route('slide_category.index');
    }
}
