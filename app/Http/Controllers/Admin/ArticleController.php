<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
use App\Http\Model\Article;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class ArticleController extends CommonController
{
    //GET admin/article admin.article.index 
    //全部文章列表
    public function index()
    {
        $data = Article::orderBy('art_id','desc')->paginate(5);
    	return view('admin.article.index',compact('data'));
    }

    //GET admin/article/create  admin.article.add  添加文章
    //添加文章
    public function create()
    {
    	$data = (new Category)->tree();
        return view('admin.article.add', compact('data'));
    }

    //POST admin/article admin.article.store 添加文章提交
    public function store()
    {
        if($input = Input::except('_token')){ //_token只用来验证csrf，不需要保存
            $input['art_time'] = time();
            $rules = [
                'art_title'=>'required',
                'art_content'=>'required',
            ];
            $message = [
                'art_title.required' => '文章标题不能为空',
                'art_content.required' => '文章内容不能为空',
            ];
            //根据规则验证分类名称是否为空
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $ret = Article::create($input);
                if ($ret) {
                    return redirect('admin/article');
                }else{
                    return back()->with('errors','添加文章失败，稍后重试!');
                }
            }else{
                //验证不通过返回
                return back()->withErrors($validator);
            }
        }
            
    }
}

