<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category'; //指定表名，默认表名会加上s，复数表示
    protected $primaryKey = 'cate_id';//find方法查找默认查找'id'，指明主键为'cate_id'
    public $timestamps = false;//默认update方法会写入更新时间戳，不需要

    public function tree()
    {
    	$categorys = $this->orderBy('cate_order','asc')->get();
        $data = $this->getTree($categorys,'cate_name','cate_id','cate_pid', 0);
        return $data;
    }

    //按分类相关性整合分类
    public function getTree($data, $field_name, $field_id='id', $field_pid='pid', $pid=0)
    {
        $arr = array();
        foreach ($data as $key => $value) {
            if ($value->$field_pid == $pid) {
                $value['_'.$field_name] = $value[$field_name];
                $arr[] = $value;
                foreach ($data as $k => $v) {
                    if ($v->$field_pid == $value->$field_id) {
                        $v['_'.$field_name] = '|--'.$v[$field_name];
                        $arr[] = $v;
                    }
                }
            }
        }
        return $arr;
    }
}
