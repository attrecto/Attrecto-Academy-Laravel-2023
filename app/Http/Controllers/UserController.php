<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function show(int $id){
        $user = User::find($id);

        return response()->json(UserResource::make($user));
    }
}

