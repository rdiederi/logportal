<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Log;


class HomeDashboardController extends Controller
{
    public function home()
    {
        $user = auth()->user();

        $user->name = ucfirst($user->name);

        return view('dashboard', ['user' => $user]);
    }

    public function google_ads()
    {
        $user = auth()->user();

        $user->name = ucfirst($user->name);

        return view('google-ads-dashboard', ['user' => $user]);
    }
}
