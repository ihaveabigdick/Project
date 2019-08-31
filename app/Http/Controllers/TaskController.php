<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function show(Request $request)
    {
//        print_r($request->input('name'));
        $request->session()->put('user',$request->input('name'));
//        echo $request->session()->get('user');
        return view('welcome')->with('data',$request->session()->get('user'));
    }


    public function index()
    {
        return view('login.index');
    }

    public function photo ()
    {
        return view('login.photo');
    }
}
