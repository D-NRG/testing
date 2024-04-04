<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        //create the user
        $attribures = request()->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|max:255|min:7',
        ]);
//        $attribures['password'] = bcrypt($attribures['password']);

        $user=User::create($attribures);
        auth()->login($user);

        return redirect('/')->with('Create account complete');
    }


}
