<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // dd(session()->all()); 
        // $m = session('foo');
        // dd($m);
        // $ip = $request->ip();
        // $path = $request->path();
        // $url = $request->url();

        // dd($ip, $path, $url);

        // dd($request->is('log*'));
        // dd($request->routeIs('log*'));

        return view('login.index');
    }

    public function store(Request $request)
    {
        // $ip = $request->ip();
        // $path = $request->path();
        // $url = $request->url();

        // dd($ip, $path, $url);

        // $email = $request->input('email');
        // $password = $request->input('password');
        // $remember = $request->boolean('remember');

        // dd($email, $password, $remember);
       
       
        
        // session(['foo'=>'Bar']);

        // session()->forget('foo');

        //auntificate user
        alert1(__('Добро пожаловать!'));

        // if(true)
        // {   
        //     return redirect()->back()->withInput();
        // }
    

        return redirect()->route('user');
    }
}