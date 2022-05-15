<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaravelController extends Controller
{
    public function laravelTest()
    {
        return view('laravel', [
            "names" => ["Laravel Jetstream", "Models Directory", "Model Factory Classes"]
        ]);
    }
}
