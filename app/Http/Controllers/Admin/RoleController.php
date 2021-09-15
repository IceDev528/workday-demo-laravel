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
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index(Request $request) 
    {
        if (permission::permitted('roles')=='fail'){ return redirect()->route('denied'); }
       
        $roles = table::roles()->get();
        
    	return view('admin.user-roles', ['roles' => $roles]);
    }

    public function add()
    {
        if (permission::permitted('role-add')=='fail'){ return redirect()->route('denied'); }

    	return view('admin.user-roles-add');
    }

    public function store(Request $request) 
    {
        if (permission::permitted('role-add')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'role_name' => 'required|max:100',
            'status' => 'required|max:20',
        ]);

        $role_name = mb_strtoupper($request->role_name);

        $status = $request->status;

        table::roles()->insert([
            [
                'role_name' => $role_name,
                'status' => $status
            ],
        ]);

        return redirect('admin/user/roles')->with('success', trans("Successful registration"));
    }

    public function edit($id, Request $request) 
    {
        if (permission::permitted('role-edit')=='fail'){ return redirect()->route('denied'); }

        $id = $request->id;

        $role = table::roles()->where('id', $id)->first();

        return view('admin.user-roles-edit', ['role' => $role]);
    }

    public function update(Request $request) 
    {
        if (permission::permitted('role-edit')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'ref' => 'required|max:200',
            'role_name' => 'required|max:100',
            'status' => 'required|max:20',
        ]);

        $ref = $request->ref;

        $role_name = mb_strtoupper($request->role_name);

        $status = $request->status;

        table::roles()->where('id', $ref)->update([
            'role_name' => $role_name,
            'status' => $status
        ]);

        return redirect('admin/user/roles')->with('success', trans("Update was successful"));
    }

    public function delete($id, Request $request) 
    {
        if (permission::permitted('role-delete')=='fail'){ return redirect()->route('denied'); }

        table::roles()->where('id', $id)->delete();

        return redirect('admin/user/roles')->with('success', trans("User role is successfully deleted"));
    }

    public function editpermission($id) 
    {
        if (permission::permitted('role-permission')=='fail'){ return redirect()->route('denied'); }

        $role = table::permissions()->where('role_id', $id)->pluck('perm_id');

    	return view('admin.user-roles-edit-permission', ['role' => $role->toArray(), 'id' => $id]);
    }

    public function updatepermission(Request $request) 
    {
        if (permission::permitted('role-permission')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'perms' => 'array|max:255',
            'role_id' => 'required|max:200',
        ]);

        $perms = $request->perms;

        $role_id = $request->role_id;

        table::permissions()->where('role_id', $role_id)->delete();

        if(isset($perms))
        {
            foreach($perms as $perm) {
                table::permissions()->insert([
                    [
                        'role_id' => $role_id,
                        'perm_id' => $perm
                    ],
                ]);
            }
        }

        return redirect('admin/user/roles/')->with('success', trans("Update was successful"));
    }

}
