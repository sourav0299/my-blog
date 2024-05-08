<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' =>['required', Rule::unique('users', 'name')],
            'email' =>['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8']
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
}
