<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

require_once 'resources/ext/code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
        if ($input = Input::all()) { //有数据提交过来
            //首先判断验证码是否正确
            $code = new \Code;
            $_code = $code->get();
            if ($_code != strtoupper($input['code']) ) {
                return back()->with('msg','验证码错误');
            }else{
                echo 'ok';
            }
        } else {
            return view('admin.login');
        }
        
        
    }
    public function code()
    {
        //echo 1234;
        $code = new \Code;
        $code->make();
        echo 1234;
    }

}
