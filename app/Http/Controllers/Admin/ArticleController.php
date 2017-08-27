<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends CommonController
{
    //GET admin/article admin.article.index 
    //全部文章列表
    public function index()
    {
    	echo '全部文章';
    }
}
