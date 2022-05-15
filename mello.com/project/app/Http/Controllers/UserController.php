<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
//use App\Repositories\Interfaces\BlogRepositoryInterface;

class UserController extends Controller
{
//    private $blogRepository;
//
//    public function __construct(BlogRepositoryInterface $blogRepository)
//    {
//        $this->blogRepository = $blogRepository;
//    }

    public function register(Request $request)
    {
        User::create([
            "name" => $request->name,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([
            "status" => true
        ]);
    }

    public function login(Request $request)
    {
        $user = User::where('name', $request->name)->first();

        if(is_null($user)) {
            return response()->json([
                "status" => false,
            ], 401);
        }

        if(Hash::check($request->password, $user->password)) {
            $token = Str::random(150);
            $user->token = $token;
            $user->save();

            return response()->json([
                "status" => true,
                "token" => $token
            ]);
        } else {
            return response()->json([
                "status" => false,
            ], 401);
        }

    }
}
