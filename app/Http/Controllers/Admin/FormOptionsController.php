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

class FormOptionsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Company
    |--------------------------------------------------------------------------
    */
    public function company() 
    {
      if (permission::permitted('company')=='fail'){ return redirect()->route('denied'); }

      $data = table::company()->get();

      return view('admin.company', ['data' => $data]);
    }

    public function addCompany(Request $request)
    {
      if (permission::permitted('company-add')=='fail'){ return redirect()->route('denied'); }

      $v = $request->validate([
        'company' => 'required|max:100',
      ]);

      $company = mb_strtoupper($request->company);

      table::company()->insert([
        ['company' => $company],
      ]);

      return redirect('admin/company')->with('success', trans("Successful registration"));
    }

    public function deleteCompany($id, Request $request)
    {
      if (permission::permitted('company-delete')=='fail'){ return redirect()->route('denied'); }

      table::company()->where('id', $id)->delete();

      return redirect('admin/company')->with('success', trans("A company is successfully deleted"));
    }

    /*
    |--------------------------------------------------------------------------
    | Department
    |--------------------------------------------------------------------------
    */
    public function department() 
    {
      if (permission::permitted('departments')=='fail'){ return redirect()->route('denied'); }

      $data = table::department()->get();
      
      return view('admin.department', ['data' => $data]);
    }

    public function addDepartment(Request $request)
    {
      if (permission::permitted('departments-add')=='fail'){ return redirect()->route('denied'); }

      $v = $request->validate([
        'department' => 'required|max:100',
      ]);

      $department = mb_strtoupper($request->department);

      table::department()->insert([
        ['department' => $department],
      ]);

      return redirect('admin/department')->with('success', trans("Successful registration"));
    }

    public function deleteDepartment($id, Request $request)
    {
      if (permission::permitted('departments-delete')=='fail'){ return redirect()->route('denied'); }

      table::department()->where('id', $id)->delete();

      return redirect('admin/department')->with('success', trans("A department is successfully deleted"));
    }

    /*
    |--------------------------------------------------------------------------
    | Job Title or Position
    |--------------------------------------------------------------------------
    */
    public function jobtitle() 
    {
      if (permission::permitted('jobtitles')=='fail'){ return redirect()->route('denied'); }

      $data = table::jobtitle()->get();

      return view('admin.jobtitle', ['data' => $data]);
    }

    public function addJobtitle(Request $request)
    {
      if (permission::permitted('jobtitles-add')=='fail'){ return redirect()->route('denied'); }

      $v = $request->validate([
        'jobtitle' => 'required|max:100',
      ]);

      $jobtitle = mb_strtoupper($request->jobtitle);

      table::jobtitle()->insert([
        [
          'jobtitle' => $jobtitle, 
        ],
      ]);

      return redirect('admin/jobtitle')->with('success', trans("Successful registration"));
    }

    public function deleteJobtitle($id, Request $request)
    {
      if (permission::permitted('jobtitles-delete')=='fail'){ return redirect()->route('denied'); }

      table::jobtitle()->where('id', $id)->delete();

      return redirect('admin/jobtitle')->with('success', trans("A job title is successfully deleted"));
    }

    /*
    |--------------------------------------------------------------------------
    | Leave Type
    |--------------------------------------------------------------------------
    */
    public function leavetype() 
    {
        if (permission::permitted('leavetypes')=='fail'){ return redirect()->route('denied'); }

        $data = table::leavetypes()->get();

        return view('admin.leavetypes', ['data' => $data]);
    }

    public function addLeavetype(Request $request)
    {
      if (permission::permitted('leavetypes-add')=='fail'){ return redirect()->route('denied'); }

      $v = $request->validate([
        'leavetype' => 'required|max:100',
        'credits' => 'required|digits_between:0,365|max:3',
        'term' => 'required|max:100',
      ]);

      $leavetype = mb_strtoupper($request->leavetype);

      $credits = $request->credits;

      $term = $request->term;

      table::leavetypes()->insert([
        ['leavetype' => $leavetype, 'limit' => $credits, 'percalendar' => $term]
      ]);

      return redirect('admin/leavetype')->with('success', trans("Successful registration"));
    }

    public function deleteLeavetype($id, Request $request)
    {
      if (permission::permitted('leavetypes-delete')=='fail'){ return redirect()->route('denied'); }
      
      table::leavetypes()->where('id', $id)->delete();

      return redirect('admin/leavetype')->with('success', trans("A leave type is successfully deleted"));
    }

    /*
    |--------------------------------------------------------------------------
    | Leave Groups
    |--------------------------------------------------------------------------
    */
    public function leaveGroups() 
    {
      if (permission::permitted('leavegroups')=='fail'){ return redirect()->route('denied'); }

      $leavetypes = table::leavetypes()->get();

      $leavegroups = table::leavegroup()->get();

      return view('admin.leavegroups', ['leavetypes' => $leavetypes, 'leavegroups' => $leavegroups]);
    }

    public function addLeaveGroups() 
    {
      if (permission::permitted('leavegroup-add')=='fail'){ return redirect()->route('denied'); }

      $leavetypes = table::leavetypes()->get();

      $leavegroups = table::leavegroup()->first();

      return view('admin.leavegroups-add', ['leavetypes' => $leavetypes, 'leavegroups' => $leavegroups]);
    }

    public function storeLeaveGroups(Request $request) 
    {
      if (permission::permitted('leavegroup-add')=='fail'){ return redirect()->route('denied'); }

      $v = $request->validate([
        'leavegroup' => 'required|max:100',
        'description' => 'required|max:155',
        'status' => 'required|boolean|max:1',
        'leaveprivileges' => 'required|max:255',
      ]);

      $leavegroup = strtoupper($request->leavegroup); 

      $description = strtoupper($request->description);

      $status = $request->status;

      $leaveprivileges = implode(',', $request->leaveprivileges);

      table::leavegroup()->insert([
          [
            "leavegroup" => $leavegroup, 
            "description" => $description, 
            "leaveprivileges" => $leaveprivileges, 
            "status" => $status
          ]
      ]);

      return redirect('admin/leavegroups')->with('success', trans("Successful registration"));
    }

    public function editLeaveGroups($id) 
    {
      if (permission::permitted('leavegroup-edit')=='fail'){ return redirect()->route('denied'); }

      $leavetypes = table::leavetypes()->get();

      $leavegroups = table::leavegroup()->where("id", $id)->first();

      return view('admin.leavegroups-edit', ['leavetypes' => $leavetypes, 'leavegroups' => $leavegroups]);
    }

    public function updateLeaveGroups(Request $request) 
    {
      if (permission::permitted('leavegroup-edit')=='fail'){ return redirect()->route('denied'); }

      $v = $request->validate([
        'leavegroup' => 'required|max:100',
        'description' => 'required|max:155',
        'status' => 'required|boolean|max:1',
        'leaveprivileges' => 'required|max:255',
        'id' => 'required|max:200'
      ]);

      $leavegroup = strtoupper($request->leavegroup); 

      $description = strtoupper($request->description);

      $status = $request->status;

      $leaveprivileges = implode(',', $request->leaveprivileges);

      $id = $request->id;

      table::leavegroup()->where('id', $id)->update([
          "leavegroup" => $leavegroup,
          "description" => $description,
          "leaveprivileges" => $leaveprivileges,
          "status" => $status
      ]);

      return redirect('admin/leavegroups')->with('success', trans("Update was successful"));
    }

    public function deleteLeaveGroups($id,Request $request) 
    {
      if (permission::permitted('leavegroup-delete')=='fail'){ return redirect()->route('denied'); }

      table::leavegroup()->where('id', $id)->delete();

      return redirect('admin/leavegroups')->with('success', trans("A leave group is successfully deleted"));
    }
} 