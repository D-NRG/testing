<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('Success','Goodbye!');
    }
    public function create()
    {
        return view('session.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(auth()->attempt($attributes)){
            return redirect('/')->with('success','Welcome back');
        }
        throw ValidationException::withMessages([
            'email'=>'Your provided credentials could not be verified'
        ]);
//        return back()
//            ->withInput()
//            ->withErrors(['email'=>'Your provided credentials could not be verified']);
    }
}
