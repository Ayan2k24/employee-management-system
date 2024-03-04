<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function registerUser(RegisterRequest $request)
    {
        // dd($request->all());
        $request->validate([
            'email'=>'required',
            'name'=>'required',
            'password'=>'required', 
        ]);
        $User = $request->all();
        $check = $this->create($User);
        return redirect()->route('auth.login');
     
    }

    public function create(array $User)
    {
        return User::create([
            'email'=>$User['email'],
            'name'=>$User['name'],
            'password'=>$User['password'],


            
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->route('dashboard')->with('success', 'Logged in Successfully!');
        } else {
            return back()->with('error', 'Invalid Credentials!');
        }

        }


}
