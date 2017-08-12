<?php

namespace App\Http\Controllers\Admin;
//use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends CommonController
{
    public function login()
    {
    	return view('admin.login');
    }
}
