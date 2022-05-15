<?php
namespace App\Repositories;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersRepository implements BlogRepositoryInterface
{
    public function find(Request $request)
    {
        $find = $request->text_input_user;
        $users = User::where('name', 'like', "%{$find}%")->get();
        return response()->json(
            $users
        );
    }

    public function sortingA()
    {
        $sortingUsersA = User::orderBy('name', 'ASC')->get();
        return response()->json(
            $sortingUsersA,
        );
    }

    public function sortingZ()
    {
        $sortingUsersZ = User::orderBy('name', 'DESC')->get();
        return response()->json(
            $sortingUsersZ
        );
    }

    public function showUsers()
    {
        $users = User::all();

        return response()->json($users)->setStatusCode(200, "ok");
    }

    public function showUser(Request $request)
    {
        $user = User::find($request->id);
        $user->skills;

        return response()->json($user)->setStatusCode(201, "ok");
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
