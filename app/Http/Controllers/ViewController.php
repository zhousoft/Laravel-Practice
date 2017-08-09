<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller
{
    public function index()
    {

        $data = [
            'name' =>'学习a',
            'value' => "laravel"
        ];
        $title = 'laravel 5.2';
        $str = '<script>alert("test")</script>';
        //return view('my_laravel', $data);
        return view('my_laravel',compact('data','title','str'));
    }

    public function view()
    {
        return view('index');
    }
}
