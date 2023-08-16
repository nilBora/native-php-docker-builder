<?php

namespace App\Http\Controllers;

class DockerLoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
}
