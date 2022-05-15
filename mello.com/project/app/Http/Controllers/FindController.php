<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Skill;

class FindController extends Controller
{
    public function findUsers(Request $request)
    {
        $find = $request->text_input_user;
        $users = User::where('name', 'like', "%{$find}%")->get();
        return response()->json(
            $users
        );
    }

    public function findSkills(Request $request)
    {
        $find = $request->text_input_skill;
        $skills = Skill::where('name', 'like', "%{$find}%")->get();
        return response()->json(
            $skills
        );
    }

    public function sortingUsersA()
    {
        $sortingUsersA = User::orderBy('name', 'ASC')->get();
        return response()->json(
            $sortingUsersA,
        );
    }
    public function sortingSkillsA()
    {
        $sortingSkillsA = Skill::orderBy('name', 'ASC')->get();
        return response()->json(
             $sortingSkillsA
        );
    }

    public function sortingUsersZ()
    {
        $sortingUsersZ = User::orderBy('name', 'DESC')->get();
        return response()->json(
          $sortingUsersZ
        );

    }

    public function sortingSkillsZ()
    {
        $sortingSkillsZ = Skill::orderBy('name', 'DESC')->get();
        return response()->json(
            $sortingSkillsZ
        );

    }

}
