<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class UsersSkillsController extends Controller
{
    public function showUsersSkills() {

        $users = User::all();
        $usersArr = [];
        $skillsArr = [];

        foreach ($users as $user) {
            $usersArr[] = User::find($user->id);
//            $user->skills;
        }
//        $users = User::find(1);

        $skills = Skill::all();
        foreach ($skills as $skill) {
            $skillsArr[] = Skill::find($skill->id);
//            $skills->users;
        }

        return view('showUsersSkills', [
            "users" => $usersArr, "skills" => $skillsArr
        ] );
    }
}
