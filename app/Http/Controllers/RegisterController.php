<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        // $data = $request->only(['name', 'email']);
        // $data = $request->except(['name', 'email']);
        // dd($data);

        // $name = $request->input('name');
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $agreement = $request->boolean('agreement');
        // $avatar = $request->file('avatar');

        // dd($name, $email, $password, $agreement);

        // dd($request->has('foo'));
        // dd($request->filled('name'));
        // dd($request->missing('name'));

        // if ($name = $request->input('name')) {
        //     $name = strtoupper($name);
        // }
        
            $validated = $request->validate([
                'name' =>['required', 'string', 'max:50'],
                'email' =>['required', 'string', 'max:50', 'email', 'unique:users'],
                'password' =>['required', 'string','min:7', 'max:50', 'confirmed'],
                'agreement' =>['accepted'],
            ]);

            // $user = new User();
            // $user->name = $validated['name'];
            // $user->email = $validated['email'];
            // $user->password = bcrypt($validated[('password')]);
            // $user->save();

            $user = User::query()->create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated[('password')]),
            ]);

                // $user = new User([
                //     'name'=>$validated['name'],
                // ]);

            

        
            return redirect()->route('user');
        
    }
}