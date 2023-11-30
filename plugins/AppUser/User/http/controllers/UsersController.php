<?php namespace AppUser\User\Http\Controllers;


use AppUser\User\Http\Resources\UserResource;
use AppUser\User\Models\User;
use AppUser\User\Controllers\Users;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
        
    }
    public function recieve()
    {
        $data = post();

        $user = new user();
        $user->username = array_values($data)[0];
        $user->password = Hash::make(array_values($data)[1]);
        $user->token =array_values($data)[2]; 
        $user->save();
        
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return UserResource::make($user);
    }
}