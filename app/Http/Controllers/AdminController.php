<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        foreach($request->inputs as $user)
        {
            User::create($user + [
                'password'=> bcrypt('password')
            ]);
        }

        return back();
    }
}
