<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller
{
    public function index()
    {

        $data = [
            'name' =>'学习',
            'value' => "laravel"
        ];
        $title = 'laravel 5.2';
        //return view('my_laravel', $data);
        return view('my_laravel',compact('data','title'));
    }
}
