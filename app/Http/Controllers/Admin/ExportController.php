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
use App\Http\Controllers\Controller;
use Storage;

class ExportController extends Controller
{
		
	function company(Request $request) 
	{
		if (permission::permitted('company')=='fail'){ return redirect()->route('denied'); }

		$date = date('Y-m-d');

        $time = date('h-i-sa');

		$file = 'companies-'.$date.'T'.$time.'.csv';

		$company = table::company()->get();

		Storage::put($file, '', 'private');

		foreach ($company as $d) 
		{
		    Storage::prepend($file, $d->id .','. $d->company);
		}

		Storage::prepend($file, '"ID"' .','. 'COMPANY');

		return Storage::download($file);
    }

	function department(Request $request) 
	{
		if (permission::permitted('departments')=='fail'){ return redirect()->route('denied'); }

		$departments = table::department()->get();

		$date = date('Y-m-d');

        $time = date('h-i-sa');

		$file = 'departments-'.$date.'T'.$time.'.csv';

		Storage::put($file, '', 'private');

		foreach ($departments as $department) 
		{
		    Storage::prepend($file, $department->id .','. $department->department);
		}

		Storage::prepend($file, '"ID"' .','. 'DEPARTMENT');

		return Storage::download($file);
    }

	function jobtitle(Request $request) 
	{
		if (permission::permitted('jobtitles')=='fail'){ return redirect()->route('denied'); }

		$jobtitles = table::jobtitle()->get();

		$date = date('Y-m-d');

        $time = date('h-i-sa');

		$file = 'jobtitles-'.$date.'T'.$time.'.csv';

		Storage::put($file, '', 'private');

		foreach ($jobtitles as $jobtitle) 
		{
		    Storage::prepend($file, $jobtitle->id .','. $jobtitle->jobtitle .','. $jobtitle->dept_code);
		}

		Storage::prepend($file, '"ID"' .','. 'DEPARTMENT' .','. 'DEPARTMENT CODE');

		return Storage::download($file);
    }

	function leavetypes(Request $request) 
	{
		if (permission::permitted('leavetypes')=='fail'){ return redirect()->route('denied'); }
		
		$leavetypes = table::leavetypes()->get();

		$date = date('Y-m-d');

        $time = date('h-i-sa');

		$file = 'leavetypes-'.$date.'T'.$time.'.csv';

		Storage::put($file, '', 'private');

		foreach ($leavetypes as $leavetype) 
		{
		    Storage::prepend($file, $leavetype->id .','. $leavetype->leavetype .','. $leavetype->limit .','. $leavetype->percalendar);
		}

		Storage::prepend($file, '"ID"' .','. 'LEAVE TYPE' .','. 'LIMIT' .','. 'TYPE');

		return Storage::download($file);
    }

	function employees() 
	{
		if (permission::permitted('reports')=='fail'){ return redirect()->route('denied'); }

		$employees = table::people()->get();

		$date = date('Y-m-d');

        $time = date('h-i-sa');

		$file = 'employee-lists-'.$date.'T'.$time.'.csv';

		Storage::put($file, '', 'private');

		foreach ($employees as $employee) 
		{
		    Storage::prepend($file, $employee->id .','. $employee->lastname.' '.$employee->firstname.' '.$employee->mi .','. $employee->age .','. $employee->gender .','. $employee->civilstatus .','. $employee->mobileno .','. $employee->emailaddress .','. $employee->employmenttype .','. $employee->employmentstatus);
		}

		Storage::prepend($file, '"ID"' .','. 'EMPLOYEE' .','. 'AGE' .','. 'GENDER' .','. 'CIVILSTATUS' .','. 'MOBILE NUMBER' .','. 'EMAIL ADDRESS' .','. 'EMPLOYMENT TYPE' .','. 'EMPLOYMENT STATUS');

		return Storage::download($file);
	}

	function birthdays() 
	{
		if (permission::permitted('reports')=='fail'){ return redirect()->route('denied'); }

		$employees = table::people()->join('company_data', 'people.id', '=', 'company_data.reference')->get();

		$date = date('Y-m-d');

		$time = date('h-i-sa');

		$file = 'employee-birthdays-'.$date.'T'.$time.'.csv';

		Storage::put($file, '', 'private');

		foreach ($employees as $employee) 
		{
		    Storage::prepend($file, $employee->idno .','. $employee->lastname.' '.$employee->firstname.' '.$employee->mi .','. $employee->department .','. $employee->jobposition .','. $employee->birthday .','. $employee->mobileno);
		}

		Storage::prepend($file, '"ID"' .','. 'EMPLOYEE NAME' .','. 'DEPARTMENT' .','. 'POSITION' .','. 'BIRTHDAY' .','. 'MOBILE NUMBER' );

		return Storage::download($file);
	}

	function users() 
	{
		if (permission::permitted('reports')=='fail'){ return redirect()->route('denied'); }

		$users = table::users()->get();

		$date = date('Y-m-d');

		$time = date('h-i-sa');

		$file = 'employee-accounts-'.$date.'T'.$time.'.csv';

		Storage::put($file, '', 'private');

		foreach ($users as $user) 
		{
			if($user->acc_type == 2) 
			{
				$a_type = 'Admin';
			} else {
				$a_type = 'Employee';
			}
			Storage::prepend($file, str_replace(",", "", $user->name) .','. "$user->email" .','. "$a_type");
			Storage::prepend($file, 'EMPLOYEE NAME' .','. 'EMAIL' .','. 'ACCOUNT TYPE');

			return Storage::download($file);
		}
	}

}
