<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sales;

class ProductController extends Controller
{
    //gp to page listproduct
    public function listproduct()
    {
        $productRecord = DB::table('product')


            ->orderBy('productname', 'asc')
            ->get();
        return view('product.listproduct', compact('productRecord'));
    }

    //go to add product page
    public function addproduct()
    {
        return view('product.addproduct');
    }

    //insert product into database
    public function insertProduct(Request $request)
    {
        $productname = $request->input('productname');
        $productdetail = $request->input('productdetail');
        $stock = $request->input('stock');
        $product_img = $request->file('product_img');

        $filename = time() . '.' . $product_img->getClientOriginalExtension();
        $request->product_img->move('assets', $filename);

        $data = array(
            'productname' => $productname,
            'productdetail' => $productdetail,
            'stock' => $stock,
            'product_img' => $filename,
        );

        //dd($data);

        DB::table('product')->insert($data);

        return redirect('/listproduct')->with('success', 'Product successfully registered');
    }

    //go to update profile page
    public function updateProduct($id)
    {
        $register = DB::table('product')->select(
            'id',
            'productname',
            'productdetail',
            'stock',
        )->where('product.id', $id)->first();

        return view('product.updateproduct', compact('register'));
    }

    //Update product data in the database
    public function editProduct(Request $request, $id)
    {
        $product = Product::find($id);

        $product->productname = $request->input('productname');
        $product->productdetail = $request->input('productdetail');
        $product->stock = $request->input('stock');
        $product->update();

        return redirect()->route('listproduct')
            ->with('Success', 'Product has been updated');
    }

    //delete product from database
    public function deleteProduct(Request $request, $id)
    {
        if ($request->ajax()) {

            Product::where('id', '=', $id)->delete();
            return response()->json(array('success' => true));
        }
    }

    public function requestproductlist($id)
    {
        $productRecord = DB::table('product')
            ->orderBy('productname', 'asc')
            ->get();

        $user_id = Auth::user()->id;
        $salesRecord = DB::table('sales')
            ->where('user_id', $user_id)

            ->orderBy('branchname', 'asc')
            ->get();

        return view('product.requestproductlist', compact('productRecord', 'salesRecord'));
    }

    public function requestproductdetails(Request $request, $salesid, $id)
    {
        // Retrieve the sales record from the database based on the provided ID
        $salesRecord = Sales::find($salesid);

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

        


        $productRecord = DB::table('product')
            ->where('id', $id)

            ->orderBy('productname', 'asc')
            ->first();

        // Return the sales record with the updated limit percentage to the view

        return view('product.requestproductdetails', compact('productRecord', 'salesRecord', 'limitPercentage'));
    }
}
