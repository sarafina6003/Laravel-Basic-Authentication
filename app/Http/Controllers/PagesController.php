<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        if(Auth::check())
            return view('pages.dashboard.dashboard');
        else return view('auth.login');
    }

    public function unavailable(){
        $data = array(
            'error_msg' => 'Šis puslapis yra nepasiekiamas!'
        );
        return view('pages.403')->with($data);
    }
}
