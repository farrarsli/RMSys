<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sales;

class SalesController extends Controller
{
    //MANAGER
    public function addsales()
    {
            return view('sales.addsales');
    }
    

    public function listsales()
    {
        $id = Auth::user()->id;
        $salesRecord = DB::table('sales')
            ->where('user_id', $id)
            
            ->orderBy('branchname', 'asc')
            ->get();
        return view('sales.listsales', compact('salesRecord'));
    }
    
    //insert data sales into database
    public function insertsales(Request $request)
    {
        $id = Auth::user()->id;
        $branchname = $request->input('branchname');
        $totalsales = $request->input('totalsales');
        $salesdate = $request->input('salesdate');
        $sales_img = $request->file('sales_img');
        $sales_status = 'Pending';

        $filename = time() . '.' . $sales_img->getClientOriginalExtension();
        $request->sales_img->move('assets', $filename);

        $data = array(

            'user_id' => $id,
            'branchname' => $branchname,
            'totalsales' => $totalsales,
            'salesdate' => $salesdate,
            'sales_img' => $sales_img,
            'sales_status' => $sales_status,
        );

        //dd($data);

        DB::table('sales')->insert($data);

        return redirect('/listsales')->with('success', 'User successfully registered');
    }


    public function allowrequest($id)
    {
         
        Sales::where('id', '=', $id)
        ->orderBy('id', 'desc')
        ->update([
            'sales_status' => 'Request Allowed',
        ]);
        return redirect()->route('branchlimit');
    }



    //OWNER
    public function salesapproval()
    {
            $salesRecord = DB::table('sales')
            ->orderBy('salesdate', 'desc')
            ->get();
            
        return view('sales.salesapproval', compact('salesRecord'));
    }

    //Approve Sales
    public function approval($id)
    {
         
        Sales::where('id', '=', $id)
        ->orderBy('id', 'desc')
        ->update([
            'sales_status' => 'Approved',
        ]);
    
    return back()->with('success', 'Sales Approved');
    
    }
    //Reject Sales
    public function reject(Request $request, $id)
    {
       
      Sales::where('id', '=', $id)
      ->update([
        'sales_status' => 'Rejected',
      ]);

      return back()->with('success', 'Sales Rejected');
    }

    public function calculateLimitByCategory($id)
{
    // Retrieve the sales record from the database based on the provided ID
    $salesRecord = Sales::find($id);

    if ($salesRecord) {
        // Get the total sales value
        $totalSales = $salesRecord->totalsales;

        // Set the initial limit percentage to 0
        $limitPercentage = 0;

        // Calculate the limit percentage based on the total sales
        if ($totalSales < 1000) {
            $limitPercentage = 10;
        } elseif ($totalSales >= 1001 && $totalSales <= 2000) {
            $limitPercentage = 20;
        } elseif ($totalSales >= 2001 && $totalSales <= 3000) {
            $limitPercentage = 30;
        } elseif ($totalSales >= 3001 && $totalSales <= 4000) {
            $limitPercentage = 40;
        } elseif ($totalSales >= 4001) {
            $limitPercentage = 50;
        }

        // Assign the limit percentage to the sales record
        $salesRecord->limit = $limitPercentage;
    }

    // Return the sales record with the updated limit percentage to the view
    return view('stock.setlimit', compact('salesRecord', 'limitPercentage'));
}

}
