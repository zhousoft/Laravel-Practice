<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category'; //指定表名，默认表名会加上s，复数表示
    protected $primaryKey = 'cate_id';//find方法查找默认查找'id'，指明主键为'cate_id'
    public $timestamps = false;//默认update方法会写入更新时间戳，不需要
}
