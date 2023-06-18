<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Sales;

class StockController extends Controller
{
    public function branchlimit()
    {

        $salesRecord = DB::table('sales')

            ->orderBy('branchname', 'asc')
            ->get();
        return view('stock.branchlimit', compact('salesRecord'));
    }

    public function limitdetails($id)
    {
        $salesRecord = DB::table('sales')
            ->where('id', $id)
            ->get();
        return view('stock.setlimit', compact('salesRecord'));
    }
    
}
