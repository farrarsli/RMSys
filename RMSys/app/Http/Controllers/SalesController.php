<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class SalesController extends Controller
{
    public function listsales()
    {
        $salesRecord = DB::table('sales')
            
            
            ->orderBy('managername', 'asc')
            ->get();
        return view('sales.listsales', compact('salesRecord'));
    }
}
