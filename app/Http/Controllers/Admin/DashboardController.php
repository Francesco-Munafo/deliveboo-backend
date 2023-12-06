<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view("admin.dashboard", compact("restaurants"));
    }
}
