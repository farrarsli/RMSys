<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Auth::user()->category;


        if ($category == 'Clerk') {
            return view('dashboard.clerkdashboard');
        }
        if ($category == 'Manager') {

            $count = DB::table('sales')
                ->count();

            return view('dashboard.managerdashboard', compact('count'));
        }
        if ($category == 'Owner') {
            return view('dashboard.ownerdashboard');
        }
        
    }
}
