<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user'; //指定表名，默认表名会加上s，复数表示
    protected $primaryKey = 'user_id';//find方法查找默认查找'id'，指明主键为'user_id'
    public $timestamps = false;//默认update方法会写入更新时间戳，不需要
}
