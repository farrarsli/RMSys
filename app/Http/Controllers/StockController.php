<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function branchlimit()
    {
            
            $salesRecord = DB::table('sales')
            
            ->orderBy('branchname', 'asc')
            ->get();
        return view('stock.branchlimit', compact('salesRecord'));
    }
    
    public function limitdetails( $id)
    {
        $register = DB::table('sales')->select(
            'id',
            'name',
            'email',
            'password',
            'category',
        )->where('users.id', '=', $id)->first();

          return view('userRegistration.updateprofile', compact('register'));
        
    }
}
