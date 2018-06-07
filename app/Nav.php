<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
     protected $fillable = [
		 'pid','name','alias','link','icon','status','target','sort',
	 ];

	 public function find_all($id=0){
		 //查找出所有导航,并对sort字段进行冒泡排序
		 $navs = Nav::all()->toArray();
		 $length = count($navs);
		 for($j=0;$j<$length-1;$j++){
			 for($i=0;$i<$length-1-$j;$i++){
				 if($navs[$i]['sort']<$navs[$i+1]['sort']){
					 $temp = $navs[$i+1];
					 $navs[$i+1] = $navs[$i];
					 $navs[$i] = $temp; 
				 }
			 }
		 }
		 $data = $this->nav_children($id,$navs);
		 return $data;
	 }

	 public function nav_children($pid,$array,$level=0){
		 //递归查找子导航
		 static $arr = [];
		 $level++;
		 foreach($array as $v){
			 if($pid == $v['pid']){
				 $v['level'] = $level;
				 $arr[] = $v;
				 $this->nav_children($v['id'],$array,$level);
			 }
		 }
		 return $arr;		
	 }

}
