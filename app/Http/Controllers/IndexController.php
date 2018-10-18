<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class IndexController extends Controller
{
    //

    public function auth1(){
        // dd(User::all());
        return view('auth1');
    }
}
