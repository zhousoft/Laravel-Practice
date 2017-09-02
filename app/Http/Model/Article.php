<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article'; //指定表名，默认表名会加上s，复数表示
    protected $primaryKey = 'art_id';//find方法查找默认查找'id'，指明主键为'art_id'
    public $timestamps = false;//默认update方法会写入更新时间戳，不需要
    protected $guarded = [];
}
