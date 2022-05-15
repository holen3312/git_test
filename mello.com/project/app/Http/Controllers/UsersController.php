<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Repositories\UsersRepository;

class UsersController extends Controller
{
    private $usersRepository;

    public function __construct(UsersRepository $userRepository)
    {
        $this->usersRepository = $userRepository;
    }

    public function login(Request $request)
    {
       return $this->usersRepository->login($request);
    }

    public function sortingUsersA()
    {
       return $this->usersRepository->sortingA();
    }

    public function sortingUsersZ()
    {
       return $this->usersRepository->sortingZ();

    }

    public function findUsers(Request $request)
    {
        return $this->usersRepository->find($request);
    }

    public function showUsers()
    {
        return $this->usersRepository->showUsers();
    }

    public function showUser(Request $request)
    {
        return $this->usersRepository->showUser($request);
    }
}
