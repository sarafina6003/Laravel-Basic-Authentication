<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function unavailable(){
        $data = array(
            'error_msg' => 'Šis puslapis yra nepasiekiamas!'
        );
        return view('pages.403')->with($data);
    }
}
