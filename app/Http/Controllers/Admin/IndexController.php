<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request; 
class IndexController extends Controller
{
    public function index()
    {
        return "index";
    }
    public function login()
    {
        echo route('profile');
        return "login";
    }
}