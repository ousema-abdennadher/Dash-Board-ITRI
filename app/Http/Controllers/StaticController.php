<?php

namespace App\Http\Controllers;

use App\Models\Itri_Admin;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class StaticController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'admin_username' => 'required',
            'admin_password' => 'required',
        ])->validate();

        if (Auth::attempt(['admin_username' => $request->admin_username, 'password' => $request->admin_password], $request->boolean('remember'))) {
            return redirect()->route('dashboard');
        }

        throw ValidationException::withMessages([
            'admin_username' => trans('auth.failed'),
        ]);
   
    }
    


    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

    


    public function register()
    {
        return view('auth.register');
    }

    
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'admin_username' => 'required',
            'admin_email' => 'required|email',
            'admin_password' => 'required|confirmed',
        ])->validate();

        Itri_Admin::create([
            'admin_username' => $request->admin_username,
            'admin_email' => $request->admin_email,
            'admin_password' => Hash::make($request->admin_password),
            
            ]);
        return redirect()->route('login');
    }



    public function admin()
    {
        $admins = Itri_Admin::all();

        return view('auth.admin', ['admins' => $admins]);
    }

    public function update(Request $request)
    {
        // Retrieve the authenticated admin
        $admin = Auth::Itri_Admin();

        // Validate the request data
        $request->validate([
            'admin_username' => 'required',
            'admin_email' => 'required|email',
        ]);

        // Update the admin data
        $admin->admin_username = $request->admin_username;
        $admin->admin_email = $request->admin_email;
        $admin->save();

    }
    










    
}
