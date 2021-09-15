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

class EmployeeController extends Controller
{

	public function index() 
	{
        if (permission::permitted('employees')=='fail'){ return redirect()->route('denied'); }

		$employees = table::people()->join('company_data', 'people.id', '=', 'company_data.reference')->get();
		
	    return view('admin.employee', ['employees' => $employees]);
	}

	public function add() 
	{
		if (permission::permitted('employee-add')=='fail'){ return redirect()->route('denied'); }

		$employee = table::people()->get();
		$company = table::company()->get();
		$department = table::department()->get();
		$jobtitle = table::jobtitle()->get();
		$leavegroup = table::leavegroup()->get();

	    return view('admin.employee-add', [
	    	'employees' => $employee,
	    	'company' => $company,
	    	'department' => $department,
	    	'jobtitle' => $jobtitle,
	    	'leavegroup' => $leavegroup
	    ]);
	}

    public function store(Request $request)
    {
    	if (permission::permitted('employee-add')=='fail'){ return redirect()->route('denied'); }

		$v = $request->validate([
			'lastname' => 'required|max:155',
			'firstname' => 'required|max:155',
			'mi' => 'nullable|max:155',
			'age' => 'nullable|digits_between:0,199|max:3',
			'gender' => 'nullable|alpha|max:155',
			'emailaddress' => 'required|email|max:155',
			'civilstatus' => 'nullable|alpha|max:155',
			'mobileno' => 'nullable|max:155',
			'birthday' => 'nullable|date|max:155',
			'nationalid' => 'nullable|max:155',
			'birthplace' => 'nullable|max:255',
			'homeaddress' => 'nullable|max:255',
			'company' => 'nullable|max:100',
			'department' => 'nullable|max:100',
			'jobtitle' => 'nullable|max:100',
			'companyemail' => 'nullable|email|max:155',
			'leaveprivilege' => 'nullable|max:155',
			'idno' => 'required|max:155',
			'employmenttype' => 'required|max:155',
			'employmentstatus' => 'required|max:155',
			'startdate' => 'nullable|date|max:155',
			'dateregularized' => 'nullable|date|max:155'
		]);
	  
		$lastname = mb_strtoupper($request->lastname);
		$firstname = mb_strtoupper($request->firstname);
		$mi = mb_strtoupper($request->mi);
		$age = $request->age;
		$gender = mb_strtoupper($request->gender);
		$emailaddress = mb_strtolower($request->emailaddress);
		$civilstatus = mb_strtoupper($request->civilstatus);
		$mobileno = $request->mobileno;
		$birthday = date("Y-m-d", strtotime($request->birthday));
		$nationalid = mb_strtoupper($request->nationalid);
		$birthplace = mb_strtoupper($request->birthplace);
		$homeaddress = mb_strtoupper($request->homeaddress);
		$company = mb_strtoupper($request->company);
		$department = mb_strtoupper($request->department);
		$jobtitle = mb_strtoupper($request->jobtitle);
		$companyemail = mb_strtolower($request->companyemail);
		$leaveprivilege = $request->leaveprivilege;
		$idno = mb_strtoupper($request->idno);
		$employmenttype = $request->employmenttype;
		$employmentstatus = $request->employmentstatus;
		$startdate = date("Y-m-d", strtotime($request->startdate));
		$dateregularized = date("Y-m-d", strtotime($request->dateregularized));

		$is_idno_taken = table::companydata()->where('idno', $idno)->exists();

		if ($is_idno_taken == 1) 
		{
			return redirect('admin/employee/add')->with('error', trans("The ID number is already used"));
		}

		$file = $request->file('image');
		$name = null;

		if($file != null) 
		{
			$name = $request->file('image')->getClientOriginalName();
			
			$destinationPath = public_path() . '/assets/faces/';
			
			$file->move($destinationPath, $name);
			
		} else {
			$name = null;
		}
		
    	table::people()->insert([
    		[
				'lastname' => $lastname,
				'firstname' => $firstname,
				'mi' => $mi,
				'age' => $age,
				'gender' => $gender,
				'emailaddress' => $emailaddress,
				'civilstatus' => $civilstatus,
				'mobileno' => $mobileno,
				'birthday' => $birthday,
				'birthplace' => $birthplace,
				'nationalid' => $nationalid,
				'homeaddress' => $homeaddress,
				'employmenttype' => $employmenttype,
				'employmentstatus' => $employmentstatus,
				'avatar' => $name,
            ],
    	]);

		$refId = DB::getPdo()->lastInsertId();
		
    	table::companydata()->insert([
    		[
    			'reference' => $refId,
				'company' => $company,
				'department' => $department,
				'jobposition' => $jobtitle,
				'companyemail' => $companyemail,
				'leaveprivilege' => $leaveprivilege,
				'idno' => $idno,
				'startdate' => $startdate,
				'dateregularized' => $dateregularized,
            ],
    	]);

    	return redirect('admin/employee/add')->with('success', trans("Successful registration")); 
    }

    public function view($id, Request $request)
    {
    	if (permission::permitted('employee-view')=='fail'){ return redirect()->route('denied'); }

		$employee = table::people()->where('id', $id)->first();
		$employee_data = table::companydata()->where('reference', $id)->first();
		$profile_photo = table::people()->select('avatar')->where('id', $id)->value('avatar');
		$leavetype = table::leavetypes()->get();
		$leavegroup = table::leavegroup()->get();

        return view('admin.employee-view', [
	    	'employee' => $employee,
	    	'employee_data' => $employee_data,
	    	'profile_photo' => $profile_photo,
	    	'leavetype' => $leavetype,
			'leavegroup' => $leavegroup
	    ]);
	}


	public function edit($id, Request $request)
    {
    	if (permission::permitted('employee-edit')=='fail'){ return redirect()->route('denied'); }

		$employee = table::people()->where('id', $id)->first();
		$employee_data = table::companydata()->where('id', $id)->first();
		$company = table::company()->get();
		$department = table::department()->get();
		$jobtitle = table::jobtitle()->get();
		$leavegroup = table::leavegroup()->get();

        return view('admin.employee-edit', [
	    	'employee' => $employee,
	    	'employee_data' => $employee_data,
	    	'company' => $company,
	    	'department' => $department,
	    	'jobtitle' => $jobtitle,
	    	'leavegroup' => $leavegroup
	    ]);
    }

    public function update(Request $request)
    {
    	if (permission::permitted('employee-edit')=='fail'){ return redirect()->route('denied'); }

		$v = $request->validate([
			'id' => 'required|max:200',
			'lastname' => 'required|max:155',
			'lastname' => 'required|max:155',
			'firstname' => 'required|max:155',
			'mi' => 'nullable|max:155',
			'age' => 'nullable|digits_between:0,199|max:3',
			'gender' => 'nullable|alpha|max:155',
			'emailaddress' => 'required|email|max:155',
			'civilstatus' => 'nullable|alpha|max:155',
			'mobileno' => 'nullable|max:155',
			'birthday' => 'nullable|date|max:155',
			'nationalid' => 'nullable|max:155',
			'birthplace' => 'nullable|max:255',
			'homeaddress' => 'nullable|max:255',
			'company' => 'nullable|max:100',
			'department' => 'nullable|max:100',
			'jobtitle' => 'nullable|max:100',
			'companyemail' => 'nullable|email|max:155',
			'leaveprivilege' => 'nullable|max:155',
			'idno' => 'required|max:155',
			'employmenttype' => 'required|max:155',
			'employmentstatus' => 'required|max:155',
			'startdate' => 'nullable|date|max:155',
			'dateregularized' => 'nullable|date|max:155'
		]);
	  
	  	$id = $request->id;
		$lastname = mb_strtoupper($request->lastname);
		$firstname = mb_strtoupper($request->firstname);
		$mi = mb_strtoupper($request->mi);
		$age = $request->age;
		$gender = mb_strtoupper($request->gender);
		$emailaddress = mb_strtolower($request->emailaddress);
		$civilstatus = mb_strtoupper($request->civilstatus);
		$mobileno = $request->mobileno;
		$birthday = date("Y-m-d", strtotime($request->birthday));
		$nationalid = mb_strtoupper($request->nationalid);
		$birthplace = mb_strtoupper($request->birthplace);
		$homeaddress = mb_strtoupper($request->homeaddress);
		$company = mb_strtoupper($request->company);
		$department = mb_strtoupper($request->department);
		$jobtitle = mb_strtoupper($request->jobtitle);
		$companyemail = mb_strtolower($request->companyemail);
		$leaveprivilege = $request->leaveprivilege;
		$idno = mb_strtoupper($request->idno);
		$employmenttype = $request->employmenttype;
		$employmentstatus = $request->employmentstatus;
		$startdate = date("Y-m-d", strtotime($request->startdate));
		$dateregularized = date("Y-m-d", strtotime($request->dateregularized));

		$file = $request->file('image');
		$name = null;

		if($file != null) 
		{
			$name = $request->file('image')->getClientOriginalName();
			
			$destinationPath = public_path() . '/assets/faces/';
			
			$file->move($destinationPath, $name);
			
		} else {
			$name = null;
		}
		
    	table::people()->where('id', $id)->update([
			'lastname' => $lastname,
			'firstname' => $firstname,
			'mi' => $mi,
			'age' => $age,
			'gender' => $gender,
			'emailaddress' => $emailaddress,
			'civilstatus' => $civilstatus,
			'mobileno' => $mobileno,
			'birthday' => $birthday,
			'birthplace' => $birthplace,
			'nationalid' => $nationalid,
			'homeaddress' => $homeaddress,
			'employmenttype' => $employmenttype,
			'employmentstatus' => $employmentstatus,
			'avatar' => $name,
    	]);

		table::companydata()->where('reference', $id)->update([
			'company' => $company,
			'department' => $department,
			'jobposition' => $jobtitle,
			'companyemail' => $companyemail,
			'leaveprivilege' => $leaveprivilege,
			'idno' => $idno,
			'startdate' => $startdate,
			'dateregularized' => $dateregularized,
    	]);

    	return redirect('admin/employee')->with('success', trans("Update was successful"));
    }

   	public function archive($id, Request $request)
    {
    	if (permission::permitted('employee-archive')=='fail'){ return redirect()->route('denied'); }

		$id = $request->id;

		table::people()->where('id', $id)->update(['employmentstatus' => 'Archived']);

		table::users()->where('reference', $id)->update(['status' => '0']);

    	return redirect('admin/employee')->with('success', trans("The employee is successfully archived"));
   	}

	public function delete(Request $request) 
	{
		if (permission::permitted('employee-delete')=='fail'){ return redirect()->route('denied'); }

		$id = $request->id;

		table::people()->where('id', $id)->delete();
		
		table::companydata()->where('reference', $id)->delete();
		
		table::attendance()->where('reference', $id)->delete();
		
		table::schedules()->where('reference', $id)->delete();
		
		table::leaves()->where('reference', $id)->delete();
		
		table::users()->where('reference', $id)->delete();

		return redirect('admin/employee')->with('success', trans("The employee is successfully removed"));
	}

}
