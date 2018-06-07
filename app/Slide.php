<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
	protected $fillable = ['cid','name','description','image','link','target','status','sort'];

	public function cate()
    {
        return $this->belongsTo('App\SlideCategory','cid')->withDefault([
			'name' => '未分类',
		]);
    }


}
