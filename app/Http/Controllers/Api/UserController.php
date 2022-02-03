<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function All()
    {
        return UserResource::collection(User::where('status', 'active')
//            ->where('rule', '!=', 'admin')
            ->get());
    }
}
