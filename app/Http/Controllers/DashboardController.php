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
            $countsales = DB::table('sales')->count();
            $countproduct = DB::table('product')->count();
            $countrequest = DB::table('request')->sum('requeststock');
            
            $countPending = DB::table('sales')
            ->where('sales_status', 'Pending')
            ->count();

            $countApproved = DB::table('sales')
            ->where('sales_status', 'Approved')
            ->count();

            $countRejected = DB::table('sales')
            ->where('sales_status', 'Rejected')
            ->count();

            $countAllowed = DB::table('sales')
            ->where('sales_status', 'Request Allowed')
            ->count();



            return view('dashboard.clerkdashboard', compact('countsales', 'countproduct', 'countrequest', 'countPending', 'countApproved', 'countRejected', 'countAllowed'));
        }
        if ($category == 'Manager') {
            
            $countsales = DB::table('sales')->count();
            $countproduct = DB::table('product')->count();
            $countrequest = DB::table('request')->sum('requeststock');
            
            $countPending = DB::table('sales')
            ->where('sales_status', 'Pending')
            ->count();

            $countApproved = DB::table('sales')
            ->where('sales_status', 'Approved')
            ->count();

            $countRejected = DB::table('sales')
            ->where('sales_status', 'Rejected')
            ->count();

            $countAllowed = DB::table('sales')
            ->where('sales_status', 'Request Allowed')
            ->count();



            return view('dashboard.managerdashboard', compact('countsales', 'countproduct', 'countrequest', 'countPending', 'countApproved', 'countRejected', 'countAllowed'));
        }
        
        if ($category == 'Owner') {

            $countsales = DB::table('sales')->count();
            $countproduct = DB::table('product')->count();
            $countrequest = DB::table('request')->sum('requeststock');
            
            $countPending = DB::table('sales')
            ->where('sales_status', 'Pending')
            ->count();

            $countApproved = DB::table('sales')
            ->where('sales_status', 'Approved')
            ->count();

            $countRejected = DB::table('sales')
            ->where('sales_status', 'Rejected')
            ->count();

            $countAllowed = DB::table('sales')
            ->where('sales_status', 'Request Allowed')
            ->count();



            return view('dashboard.ownerdashboard', compact('countsales', 'countproduct', 'countrequest', 'countPending', 'countApproved', 'countRejected', 'countAllowed'));
        }
    }
}
