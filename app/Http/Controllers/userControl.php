<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use function Laravel\Prompts\error;
use function PHPUnit\Framework\isNull;

class userControl extends Controller
{
    
    public function login()
    {
        return view('user.login',['title'=>'LogIn']);
    }
    public function auth(Request $req)
    {
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:40'
        ]);
        if(User::where('email',$req->email)->first())
            if(Hash::check($req->password,User::where('email',$req->email)->first()->password)) {
                Auth::login(User::where('email',$req->email)->first());
                return redirect(route('welcome'));
            }
            else {
                redirect()->back();
            }
        else {
            redirect()->back();
        }

    }
    public function signup()
    {
        return view('user.signup',['title'=>'SignUp']);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|min:6|max:40|alpha:ascii',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:40'
        ]);
        if(isNull(User::where('email',$request->email)->first())) {
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password
            ]); 
            return $this->auth($request);
        }
        else
            return redirect()->back();
    }
    public function logout() 
    {
        Auth::logout();
        return redirect(route('welcome'));
    }

    /**
     * Display the user info.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified user info.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
