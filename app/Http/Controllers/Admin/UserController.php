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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function index()
    {
        if (permission::permitted('users')=='fail'){ return redirect()->route('denied'); }

        $users_roles = table::users()->join('users_roles', 'users.role_id', '=', 'users_roles.id')->select('users.*', 'users_roles.role_name')->get();

        $users = table::users()->get();

        $roles = table::roles()->get();

        $employees = table::people()->get();

        return view('admin.users', [
            'users' => $users,
            'roles' => $roles,
            'employees' => $employees, 
            'users_roles' => $users_roles
        ]);
    }

    public function add()
    {
        if (permission::permitted('user-add')=='fail'){ return redirect()->route('denied'); }

        $roles = table::roles()->get();

        $employees = table::people()->get();

        return view('admin.users-add', [
            'roles' => $roles,
            'employees' => $employees, 
        ]);
    }

    public function register(Request $request)
    {
        if (permission::permitted('user-add')=='fail'){ return redirect()->route('denied'); } 

        $v = $request->validate([
            'ref' => 'required|max:100',
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'role_id' => 'required|digits_between:1,99|max:2',
            'acc_type' => 'required|digits_between:1,99|max:2',
            'password' => 'required|min:8|max:100',
            'password_confirmation' => 'required|min:8|max:100',
            'status' => 'required|boolean|max:1',
        ]);

        $ref = $request->ref;
        $name = $request->name;
    	$email = $request->email;
		$role_id = $request->role_id;
		$acc_type = $request->acc_type;
		$password = $request->password;
		$password_confirmation = $request->password_confirmation;
		$status = $request->status;

        if ($password != $password_confirmation) 
        {
            return redirect('admin/users')->with('error', trans("The passwords must match"));
        }

        $is_user_exist = table::users()->where('email', $email)->count();

        if($is_user_exist >= 1) 
        {
            return redirect('admin/users')->with('error', trans("This user is already registered"));
        }

        $idno = table::companydata()->where('reference', $ref)->value('idno');

    	table::users()->insert([
    		[
                'reference' => $ref,
                'idno' => $idno,
				'name' => $name,
				'email' => $email,
				'role_id' => $role_id,
				'acc_type' => $acc_type,
				'password' => Hash::make($password),
				'status' => $status,
            ],
    	]);

    	return redirect('admin/users')->with('success', trans("Successful registration"));
    }

    public function edit($id) 
    {
        if (permission::permitted('user-edit')=='fail'){ return redirect()->route('denied'); }

        $roles = table::roles()->get();
        
        $user = table::users()->where('id', $id)->first();

        return view('admin.users-edit', [
            'roles' => $roles,
            'user' => $user, 
        ]);
    }

    public function update(Request $request) 
    {
        if (permission::permitted('user-edit')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'ref' => 'required|max:200',
            'role_id' => 'required|digits_between:1,99|max:2',
            'acc_type' => 'required|digits_between:1,99|max:2',
            'status' => 'required|boolean|max:1',
        ]);

        $ref = $request->ref;
		$role_id = $request->role_id;
		$acc_type = $request->acc_type;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        $status = $request->status;

        if ($password !== null && $password_confirmation !== null) 
        {
            $v = $request->validate([
                'password' => 'required|min:8|max:100',
                'password_confirmation' => 'required|min:8|max:100',
            ]);

            if ($password != $password_confirmation) 
            {
                return redirect('admin/users')->with('error', trans("The passwords must match"));
            }

            table::users()->where('reference', $ref)->update([
                'role_id' => $role_id,
                'acc_type' => $acc_type,
                'status' => $status,
                'password' => Hash::make($password),
            ]);
            
        } else {
            table::users()->where('reference', $ref)->update([
                'role_id' => $role_id,
                'acc_type' => $acc_type,
                'status' => $status,
            ]);
        }

    	return redirect('admin/users')->with('success', trans("Successful registration"));       
    }

    public function delete($id, Request $request)
    {
        if (permission::permitted('user-delete')=='fail'){ return redirect()->route('denied'); }

    	table::users()->where('id', $id)->delete();
    	
        return redirect('admin/users')->with('success', trans("A user account is successfully deleted"));
    }
}
