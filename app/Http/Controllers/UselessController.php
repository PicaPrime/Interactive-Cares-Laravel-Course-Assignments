<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UselessController extends Controller
{
    public function login() {
        return view('auth.login');
    }


    public function register() {
        return view('auth.register');
    }


    public function categories() {
        return view('blog.categories');
    }

    public function singleBlog() {
        return view('blog.single-blog');
    }


    public function user(){
        return view('user.profile');
    }
}


