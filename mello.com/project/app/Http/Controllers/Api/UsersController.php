<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skill;

class UsersController extends Controller
{

    public function showUsers()
    {
        $users = User::all();

        return response()->json($users)->setStatusCode(200, "ok");
    }

    public function showSkills()
    {
        $skills = Skill::all();

        return response()->json($skills)->setStatusCode(200, "ok");
    }

    public function showUser(Request $request)
    {
        $user = User::find($request->id);
        $user->skills;

        return response()->json($user)->setStatusCode(201, "ok");
    }

    public function showSkill(Request $request)
    {
        $skill = Skill::find($request->id);
        $skill->users;

        return response()->json($skill)->setStatusCode(201, "ok");
    }

}
