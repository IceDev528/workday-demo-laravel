<?php
/*
* Workday - A time clock application for employees
* URL: https://codecanyon.net/item/workday-a-time-clock-application-for-employees/23076255
* Support: official.codefactor@gmail.com
* Version: 3.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
namespace App\Http\Controllers\admin;

use DB;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function account() 
    {
        $id = \Auth::user()->id;

        $myuser = table::users()->where('id', $id)->first();

        return view('admin.account', ['myuser' => $myuser]);
    }

    public function updateUser(Request $request) 
    {
		$v = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
		]);

        $id = \Auth::id();

        $name = mb_strtoupper($request->name);

        $email = mb_strtolower($request->email);

        if($id == null) 
        {
            return redirect('admin/account')->with('error', trans("Invalid request"));
        }

        table::users()->where('id', $id)->update([
            'name' => $name,
            'email' => $email,
        ]);

        return redirect('admin/account')->with('success', trans("Update was successful"));
    }

    public function updatePassword(Request $request) 
    {
        $v = $request->validate([
            'currentpassword' => 'required|max:100',
            'newpassword' => 'required|min:8|max:100',
            'confirmpassword' => 'required|min:8|max:100',
        ]);

        $id = \Auth::id();
        
        $password = \Auth::user()->password;
        
        $c_password = $request->currentpassword;
        
        $n_password = $request->newpassword;
        
        $c_p_password = $request->confirmpassword;

        if($id == null) 
        {
            return redirect('admin/account')->with('error', trans("Invalid request"));
        }
        
        if($n_password != $c_p_password) 
        {
            return redirect('admin/account')->with('error', trans("The new passwords must match"));
        }

        if(Hash::check($c_password, $password)) 
        {
            table::users()->where('id', $id)->update([
                'password' => Hash::make($n_password),
            ]);

            return redirect('admin/account')->with('success', trans("Password is successfully updated"));
        } else {
            return redirect('admin/account')->with('error', trans("Wrong credentials"));
        }
    }
}

