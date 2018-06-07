<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //����������ֵ���ֶ�
	 protected $fillable = ['cid','title','author','introduction','content','picture','status','is_top','is_recommend','sort','created_at'];

	  public function category()
    {
        return $this->belongsTo('App\Category','cid');
    }


}
