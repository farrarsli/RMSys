<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Auth::user()->category;


        if ($category == 'Clerk') {
            return view('dashboard.clerkdashboard');
        }
        if ($category == 'Manager') {
            return view('dashboard.managerdashboard');
        }
        if ($category == 'Owner') {
            return view('dashboard.ownerdashboard');
        }
        
    }
}
