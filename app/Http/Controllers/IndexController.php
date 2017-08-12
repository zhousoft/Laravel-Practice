<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Model\User;

class IndexController extends Controller
{
    public function index()
    {
        // $pdo = DB::connection()->getPdo();
        // dd($pdo);
        // $users = DB::table('user')->get();
        // dd($users);
       // $user = User::where('user_id','>',1)->get();
    	$user = User::find(1);
    	$user->user_name = "wangwu";
    	$user->update();
    	dd($user);
    }
}
