<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*模型命名取表的单数*/
class Status extends Model
{
    protected $table = 'statuses';

    protected $primaryKey = 'id';

    protected $fillable = ['content'];

/*  protected function asDateTime($val)
    {
    	return $val;
    }*/
    /*Eloquent 模型关联*/
    /*指明一条微博只属于一个用户*/
    public function user()
    {
    	return $this->belongsTo(User::class);
    }


}
