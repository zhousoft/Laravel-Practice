<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Category;
class CategoryController extends CommonController
{
    //GET admin/category admin.category.index 
    //全部分类列表
    public function index()
    {
    	$categorys = (new Category)->tree();
    	return view('admin.category.index')->with('data',$categorys);
    }
    
    //POST admin/category admin.category.store
    public function store()
    {

    }
    //GET admin/category/create  admin.category.create
    //添加分类
    public function create()
    {

    }
    //GET admin/category/{category}      | admin.category.show
    //显示单个分类
    public function show()
    {

    }
    //PUT admin/category/{category}   | admin.category.update
    //更新分类
    public function update()
    {

    }
    //DELETE admin/category/{category}  | admin.category.destroy
    //删除分类
    public function destory()
    {

    }
    //GET admin/category/{category}/edit | admin.category.edit
    //编辑分类
    public function edit()
    {

    }

    public function changeOrder()
    {
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $ret = $cate->update();
        if ($ret) {
            $data = [
                'status' => 0,
                'msg' => '分类排序更新成功'
            ];
        }else{
            $date = [
                'status' => '1',
                'msg' => '分类排序更新失败'
            ];
        }
        return $data;
    }
}
