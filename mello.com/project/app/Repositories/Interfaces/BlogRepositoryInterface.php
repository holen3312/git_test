<?php
namespace App\Repositories\Interfaces;
use App\Models\User;
use Illuminate\Http\Request;

interface BlogRepositoryInterface
{
    public function find(Request $request);
    public function sortingA();
    public function sortingZ();

}
