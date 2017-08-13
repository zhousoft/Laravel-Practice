<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

require_once 'resources/ext/code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
    	return view('admin.login');
    }
    public function code()
    {
    	//echo 1234;
    	$code = new \Code;
    	$code->make();
    	echo 1234;
    }
    public function getcode()
    {
    	$code = new \Code;
    	echo $code->get();
    }
}
