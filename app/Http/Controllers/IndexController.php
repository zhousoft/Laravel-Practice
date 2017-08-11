<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    public function index()
    {
        // $pdo = DB::connection()->getPdo();
        // dd($pdo);
        $users = DB::table('user')->get();
        dd($users);
    }
}
