<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request; 
class IndexController extends Controller
{
    public function index()
    {
	session(['admin'=>null]);
        return "index";
    }
    public function login()
    {
        session(['admin'=>1]);
        return "login";
    }
}
