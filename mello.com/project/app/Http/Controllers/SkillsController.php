<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Repositories\SkillsRepository;

class SkillsController extends Controller
{
    private $skillsRepository;

    public function __construct(SkillsRepository $skillsRepository)
    {
        $this->skillsRepository = $skillsRepository;
    }


    public function sortingSkillsA()
    {
       return $this->skillsRepository->sortingA();
    }

    public function sortingSkillsZ()
    {
       return $this->skillsRepository->sortingZ();

    }

    public function findSkills(Request $request)
    {
        return $this->skillsRepository->find($request);

    }

    public function showSkills()
    {
        return $this->skillsRepository->showSkills();
    }

    public function showSkill(Request $request)
    {
        return $this->skillsRepository->showSkill($request);
    }

}
