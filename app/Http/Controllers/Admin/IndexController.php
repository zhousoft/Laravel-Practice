<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\User;
class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
    	return view('admin.info');
    }
    //修改管理员密码
    public function pass()
    {
    	if($input = Input::all()){
    		$rules = [
    			'password'=>'required|between:6,20|confirmed',
    		];
    		$message = [
    			'password.required'=>'新密码不能为空',
    			'password.between'=>'新密码必须在6到20位之间',
    			'password.confirmed'=>'输入新密码不一致',
    		];
    		//根据规则验证密码是否为空
    		$validator = Validator::make($input,$rules,$message);
    		if($validator->passes()){
    			$user = User::get()->where('user_name','zhou')->first();
    			$_password = Crypt::decrypt($user->user_pass);
    			if($input['password_o'] == $_password){
    				$user->user_pass = Crypt::encrypt($input['password']);
    				$user->update();
    				return redirect('/admin/info');

    			}else{
    				return back()->with('errors','原密码错误');
    			}
    		}else{
    			//验证不通过返回
    			return back()->withErrors($validator);
    		}
    	}else{
    		return view('admin.pass');
    	}
    	
    }
}
