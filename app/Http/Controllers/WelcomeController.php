<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function test(){
        echo 'day là function test trong welcomecontroller';
        return redirect()->route('ddr');
    }
}
