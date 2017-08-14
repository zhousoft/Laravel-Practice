<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests;
use App\Http\Model\User;
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
            }
            $user = User::get()->where('user_name','zhou')->first();
            if ($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass) != $input['user_pass']) {
                return back()->with('msg','用户名或密码错误！');
            }
            //登录成功
            return redirect('admin/index');
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
    public function crypt()
    {
        $str = '123456';
        echo Crypt::encrypt($str);
    }

}
