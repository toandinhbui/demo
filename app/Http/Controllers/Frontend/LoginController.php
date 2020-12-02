<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_mentor(){
        return view('client.page_partials.login-mentor');
    }
    public function login_student(){
        return view('client.page_partials.login-student');
    }
}
