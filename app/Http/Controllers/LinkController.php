<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$links = Link::select('id','sort','name','link','status')->orderBy('sort','desc')->get();
		return view('link.index',['links'=>$links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('link.add');
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
			'name' => 'required|string|max:255',
			'image' => 'nullable|string|max:100',
			'link' => 'nullable|url|max:255',
			'status' => 'required|integer|min:0|max:1',
			'sort' => 'required|integer|digits_between:1,9',
		]);

		$store = Link::create([
			'name' => $request->name,
			'image' => $request->image,
			'link' => $request->link,
			'status' => $request->status,
			'sort' => $request->sort,
		]);

		if($store){
			return response()->json(['code'=>1,'url'=>route('link.index'),'msg'=>'添加链接成功']);
		}else{
			return response()->json(['msg'=>'添加失败']);
		}
		return redirect()->route('link.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$link = Link::find($id);
		return view('link.edit',['link'=>$link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'image' => 'nullable|string|max:100',
			'link' => 'nullable|url|max:255',
			'status' => 'required|integer|min:0|max:1',
			'sort' => 'required|integer|digits_between:0,9',
		]);

		$update = Link::where('id',$id)->update([
			'name' => $request->name,
			'image' => $request->image,
			'link' => $request->link,
			'status' => $request->status,
			'sort' => $request->sort,
		]);

		if($update){
			return response()->json(['code'=>1,'url'=>route('link.edit',['id'=>$id]),'msg'=>'更新成功']);
		}else{
			return response()->json(['msg'=>'更新失败']);
		}
		return redirect()->route('link.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$delete = Link::destroy($id);
		if($delete){
			return response()->json(['code'=>1,'url'=>route('link.index'),'msg'=>'删除成功']);
		}else{
			return response()->json(['msg'=>'删除失败']);
		}
		return redirect()->route('link.index');
    }
}
