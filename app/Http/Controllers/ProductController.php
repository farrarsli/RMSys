<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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


        $data = array(
            'productname' => $productname,
            'productdetail' => $productdetail,
            'stock' => $stock,

        );

        //dd($data);

        DB::table('product')->insert($data);

        return redirect('/listproduct')->with('success', 'Product successfully registered');
    }

    //go to update profile page
    public function updateProduct( $id)
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


}
