<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestHelloController extends Controller
{
    public function test()
    {
        return view('testhello');
    }

    public function admin()
    {
        return view('admin');
    }
}
