<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
	protected $fillable = [
		'pid','name','alias','icon','picture','content','type','detail_template','detail_template','sort'
	];

	public function findAll($id=0){
		$category = Category::all();
		if($id == 0){
			//����idΪ0,�Ƚ������򲢵ݹ��������Ŀ
			$category = $this->lsort($category);
			$data = $this->find_children($category,$id);
		}else{
			//id��Ϊ0��ֱ�Ӳ�������Ŀ
			$data = $this->find_children($category,$id);
		}
		return $data;
	}

	public function find_children($array,$id,$level=0){
		static $v =[];
		foreach($array as $a){
			if($a['pid'] == $id){
				$a['level'] = $level;
				$v[] = $a;
				$this->find_children($array,$a['id'],$level+1);
			}
		}
		return $v;
	}

	public function lsort($category){
		$n = count($category);
		for($i=0;$i<$n-1;$i++){
			for($j=0;$j<$n-1-$i;$j++){
				if($category[$j]['sort']<$category[$j+1]['sort']){
					$temp = $category[$j];
					$category[$j] = $category[$j+1];
					$category[$j+1] = $temp;
				}
			}
		}
		return $category;
	}


}
