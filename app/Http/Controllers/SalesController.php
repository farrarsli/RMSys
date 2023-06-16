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
}
