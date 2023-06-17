<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if ($user = Auth::user()) {
        //if login
        return redirect('/dashboard');
    } else {
        //if not login
        return redirect('login'); }
});

//------------------------------------------MANAGE REGISTRATION------------------------------------------

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
//Profile Registration
Route::get('/registeruser', [App\Http\Controllers\UserController::class, 'registeruser'])->name('registeruser');
Route::get('/listuser', [App\Http\Controllers\UserController::class, 'listuser'])->name('listuser');
//Add user into database
Route::post('/addUser', [App\Http\Controllers\UserController::class, 'addUser'])->name('addUser');

//view Update Profile page
Route::get('/updateprofile/{id}', [App\Http\Controllers\UserController::class, 'updateprofile'])->name('updateprofile');
//update query
Route::post('/updateUser/{id}', [App\Http\Controllers\UserController::class, 'updateUser'])->name('updateUser');
//delete profile
Route::post('/deleteItem/{id}', [App\Http\Controllers\UserController::class, 'deleteItem'])->name('deleteItem');
//delete user from database
Route::delete('/delprofile/{id}',[App\Http\Controllers\UserController::class, 'delprofile'])->name('delprofile');


//------------------------------------------MANAGE PRODUCT------------------------------------------log

//go to list product page (Clerk)
Route::get('/listproduct', [App\Http\Controllers\ProductController::class, 'listproduct'])->name('listproduct');
//add product
Route::get('/addproduct', [App\Http\Controllers\ProductController::class, 'addproduct'])->name('addproduct');
//Add product into database
Route::post('/insertProduct', [App\Http\Controllers\ProductController::class, 'insertProduct'])->name('insertProduct');
//go to update product page
Route::get('/updateProduct/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('updateProduct');
//Update product in database
Route::post('/editProduct/{id}', [App\Http\Controllers\ProductController::class, 'editProduct'])->name('editProduct');
//delete product from database
Route::delete('/deleteProduct/{id}',[App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('deleteProduct');

Route::get('/requestproductlist', [App\Http\Controllers\ProductController::class, 'requestproductlist'])->name('requestproductlist');

Route::get('/requestproductdetails/{id}', [App\Http\Controllers\ProductController::class, 'requestproductdetails'])->name('requestproductdetails');

//------------------------------------------MANAGE SALES------------------------------------------


//go to list sales (Manager)
Route::get('/listsales', [App\Http\Controllers\SalesController::class, 'listsales'])->name('listsales');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/addsales', [App\Http\Controllers\SalesController::class, 'addsales'])->name('addsales');
Route::post('/insertsales', [App\Http\Controllers\SalesController::class, 'insertsales'])->name('insertsales');


//----------------------------------------------Sale Approval----------------------------------------------
Route::get('/salesapproval', [App\Http\Controllers\SalesController::class, 'salesapproval'])->name('salesapproval');
Route::get('/approval/{id}', [App\Http\Controllers\SalesController::class, 'approval'])->name('approval');
Route::get('/reject/{id}', [App\Http\Controllers\SalesController::class, 'reject'])->name('reject');

//----------------------------------------------Stock Request (Clerk)----------------------------------------------
Route::get('/branchlimit', [App\Http\Controllers\StockController::class, 'branchlimit'])->name('branchlimit');
Route::get('/setlimit', [App\Http\Controllers\StockController::class, 'setlimit'])->name('setlimit');
Route::get('/calculateLimitByCategory/{id}', [App\Http\Controllers\SalesController::class, 'calculateLimitByCategory'])->name('calculateLimitByCategory');
Route::get('/allowrequest/{id}', [App\Http\Controllers\SalesController::class, 'allowrequest'])->name('allowrequest');
