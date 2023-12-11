<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;
use Str;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'type' => ['required'],
            'username' => ['required', 'max:50', Rule::unique('users', 'username')],
            'password' => ['required', 'min:5', 'max:20'],
            'station' => ['required', 'min:5', 'max:40'],
            'station_id' => ['required', 'max:40'],
        ]);
        
        session()->flash('success', 'Your account has been created.');

        $user = User::forceCreate([
            'name' => $attributes['name'],
            'username' => $attributes['username'],
            'password' => bcrypt($attributes['password'] ),
            'type' => strtolower($attributes['type']),
            'api_token' => Str::random(80),
            'remember_token' => Str::random(10),
            'station' => $attributes['station'],
            'station_id' => $attributes['station_id']
        ]);
        
        Auth::login($user);
        // return redirect('/dashboard');
        return response()->json([], 200);
    }
}
