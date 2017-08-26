<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
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
    
    
    //GET admin/category/create  admin.category.create  添加分类
    //添加分类
    public function create()
    {
        $data = Category::where('cate_pid',0)->get();
        return view('admin/category/add',compact('data'));
    }

    //POST admin/category admin.category.store 添加分类提交
    public function store()
    {
        if($input = Input::except('_token')){ //_token只用来验证csrf，不需要保存
            $rules = [
                'cate_name'=>'required',
            ];
            $message = [
                'cate_name.required'=>'分类名称不能为空'
            ];
            //根据规则验证分类名称是否为空
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
             $ret = Category::create($input);   
             if ($ret) {
                 return redirect('admin/category');
             }else{
                return back()->with('errors',"数据填充失败，请稍后重试");
             }
            }else{
                //验证不通过返回
                return back()->withErrors($validator);
            }
        }else{
            return view('admin.category');
        }
    }
    //GET admin/category/{category}/edit | admin.category.edit
    //编辑分类
    public function edit($cate_id)
    {
        $field = Category::find($cate_id); 
        $data = Category::where('cate_pid',0)->get(); 
        return view('admin/category/edit',compact('field','data')); 
    }

    //PUT admin/category/{category}   | admin.category.update
    //更新分类
    public function update($cate_id)
    {
        if($input = Input::except('_token','_method')){ //_token只用来验证csrf，不需要保存
            $rules = [
                'cate_name'=>'required',
            ];
            $message = [
                'cate_name.required'=>'分类名称不能为空'
            ];
            //根据规则验证分类名称是否为空
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
             $ret = Category::where('cate_id',$cate_id)->update($input);  
             if ($ret) {
                 return redirect('admin/category');
             }else{
                return back()->with('errors',"数据更新失败，请稍后重试");
             }
            }else{
                //验证不通过返回
                return back()->withErrors($validator);
            }
        }else{
            return view('admin.category');
        }
    }

    //GET admin/category/{category}      | admin.category.show
    //显示单个分类
    public function show()
    {

    }

    
    //DELETE admin/category/{category}  | admin.category.destroy
    //删除分类
    public function destroy($cate_id)
    {
        $ret = Category::where('cate_id',$cate_id)->delete();
        if ($ret) {
            $data = [
                'status' => 0,
                'msg' => '分类删除成功'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分类删除失败，请稍后重试'
            ];
        }
        return $data;
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
