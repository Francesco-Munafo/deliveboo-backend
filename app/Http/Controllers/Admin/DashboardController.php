<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $user = auth()->user();

        if ($user) {
            $restaurants = $user->restaurants;
            return view("admin.dashboard", compact("restaurants"));
        }

        return view("admin.dashboard")->with('message', 'Nessun ristorante trovato per questo utente.');
    }
}
