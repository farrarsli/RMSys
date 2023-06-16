<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function registeruser()
    {
            return view('userRegistration.registeruser');
    }
    public function listuser()
    {
        $userRecord = DB::table('users')
            
            
            ->orderBy('name', 'asc')
            ->get();
        return view('userRegistration.listuser', compact('userRecord'));
    }

    public function index()
    { 
    //register page
        $id = Auth::user()->id;
        $userData = DB::table('users')->select(
            'id',
            'name',
            'email',
            'ic',
            'category',
        )->where('users.id', '=', $id)->first();

        return view('register.myProfile', compact('userData'));
    }
    
    //insert data into database (register profile)
    public function addUser(Request $request)
    {


        $name = $request->input('name');
        $email = $request->input('email');
        $ic = $request->input('ic');
        $category = $request->input('category');


        $data = array(


            'name' => $name,
            'email' => $email,
            'password' => Hash::make($ic),
            'category' => $category,

        );

        //dd($data);

        DB::table('users')->insert($data);

        return redirect('/listuser')->with('success', 'User successfully registered');
    }

    //view update profile 
    public function updateprofile( $id)
    {
        $register = DB::table('users')->select(
            'id',
            'name',
            'email',
            'password',
            'category',
        )->where('users.id', '=', $id)->first();

          return view('userRegistration.updateprofile', compact('register'));
        
    }

    public function updateUser(Request $request, $id)
    {
        $users = User::find($id);

        
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->category = $request->input('category');
        $users->update();

        return redirect()->route('listuser')
            ->with('Success', 'Profile has been updated');
    }

    //delete product from database
    public function delprofile(Request $request, $id)
    {
        if ($request->ajax()) {

            User::where('id', '=', $id)->delete();
            return response()->json(array('success' => true));
        }
    }

}
