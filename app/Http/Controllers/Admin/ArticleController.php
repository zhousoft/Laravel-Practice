<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
class ArticleController extends CommonController
{
    //GET admin/article admin.article.index 
    //全部文章列表
    public function index()
    {
    	echo '全部文章';
    }

    //GET admin/article/create  admin.article.add  添加文章
    //添加文章
    public function create()
    {
    	$data = (new Category)->tree();
        return view('admin.article.add', compact('data'));
    }
}
