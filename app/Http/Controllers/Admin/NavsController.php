<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends Controller
{
    //get.admin/navs  全部导航列表
    public function index()
    {
        $data = Navs::orderBy('nav_order','asc')->get();
        return view('admin.navs.index',compact('data'));
    }
    //get.admin/navs/{nav}  显示单个导航信息
    public function show()
    {

    }

    //get.admin/navs/create   添加导航链接
    public function create()
    {
        return view('admin/navs/add');
    }

    //post.admin/navs  添加自定义导航提交
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'nav_name'=>'required',
            'nav_url'=>'required',
        ];

        $message = [
            'nav_name.required'=>'自定义导航名称不能为空！',
            'nav_url.required'=>'自定义导航URL不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $ret = Navs::create($input);
            if($ret){
                return redirect('admin/navs');
            }else{
                return back()->with('errors','自定义导航失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/navs/{navs}/edit  编辑自定义导航
    public function edit($nav_id)
    {
        $field = Navs::find($nav_id);
        return view('admin.navs.edit',compact('field'));
    }

    //put.admin/navs/{navs}    更新自定义导航
    public function update($nav_id)
    {
        $input = Input::except('_token','_method');
        $ret = Navs::where('nav_id',$nav_id)->update($input);
        if($ret){
            return redirect('admin/navs');
        }else{
            return back()->with('errors','自定义导航更新失败，请稍后重试！');
        }
    }

     //delete.admin/navs/{navs}   删除自定义导航
    public function destroy($nav_id)
    {
        $re = Navs::where('nav_id',$nav_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '自定义导航删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '自定义导航删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
}
