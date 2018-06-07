<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable =[
		'pid',
		'menu_name',
		'route',
		'icon',
		'status',
		'sort',
		'menu_sort',
	];

	public function  msort($id=0){
		$menus = array_reverse(Menu::all()->toArray());//查询所有菜单
		if($menus){
			//如果菜单不为空，排序并找出子菜单
			$sortby = $this->sortby($menus);
			$data = $this->a($id,$sortby);
		}else{
			$data = $menus;//如果菜单为空，直接返回空
		}
		return $data;
	}

	public function a($pid,$array,$level=0){
		//递归找出子菜单
		static $s = [];
		$level++;
		foreach($array as $a){
			if($pid == $a['pid']){
				$a['level'] = $level;
				$s[] = $a;
				$this->a($a['id'],$array,$level);
			}
		}
		return $s;
	}

	public function sortby($array){
		//根据menu_sort排序
		$temp = [];
		static $a = [];
		$bigger = $array[0];
		for($i=0;$i<count($array);$i++){
			if($bigger['menu_sort']>$array[$i]['menu_sort']){
				$temp[] = $array[$i];
			}else{
				if($bigger['id']!==$array[$i]['id']){
					$temp[] = $bigger;
					$bigger = $array[$i];
				}				
			}
		}
		$a[] = $bigger;
		if(count($temp)>0){
			$this->sortby($temp);
		}
		return $a;
	}



}
