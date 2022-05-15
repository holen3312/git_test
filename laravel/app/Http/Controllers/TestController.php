<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function hello()
        {
            return view('hello', [
                "name" => "Stepan",
                "surname" => "Bandera"
            ]);
        }

    public function test()
    {
        return view('test');
    }
}
