<?php
namespace App\Repositories;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class SkillsRepository implements BlogRepositoryInterface
{
    public function find(Request $request)
    {
        $find = $request->text_input_skill;
        $skills = Skill::where('name', 'like', "%{$find}%")->get();
        return response()->json(
            $skills
        );
    }

    public function sortingA()
    {
        $sortingSkillsA = Skill::orderBy('name', 'ASC')->get();
        return response()->json(
            $sortingSkillsA,
        );
    }

    public function sortingZ()
    {
        $sortingSkillsZ = Skill::orderBy('name', 'DESC')->get();
        return response()->json(
            $sortingSkillsZ
        );
    }
    public function showSkills()
    {
        $skills = Skill::all();

        return response()->json($skills)->setStatusCode(200, "ok");
    }

    public function showSkill(Request $request)
    {
        $skill = Skill::find($request->id);
        $skill->users;

        return response()->json($skill)->setStatusCode(201, "ok");
    }

}
