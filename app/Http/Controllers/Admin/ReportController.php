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
use DateTimeZone;
use DateTime;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
	public function index() 
	{
		if (permission::permitted('reports')=='fail'){ return redirect()->route('denied'); }
		
		$lastviews = table::reportviews()->get();

    	return view('admin.reports', ['lastviews' => $lastviews]);
    }

    public function overview(Request $request) 
	{
		if (permission::permitted('reports')=='fail'){ return redirect()->route('denied'); }

		$today = date('M, d Y');

		$employee = table::people()->join('company_data', 'people.id', '=', 'company_data.reference')->where('people.employmentstatus', 'Active')->get();
		
		$employee_data = table::companydata()->get();

		$age_18_24 = table::people()->where([['age', '>=', '18'], ['age', '<=', '24']])->count();

		$age_25_31 = table::people()->where([['age', '>=', '25'], ['age', '<=', '31']])->count();

		$age_32_38 = table::people()->where([['age', '>=', '32'], ['age', '<=', '38']])->count();

		$age_39_45 = table::people()->where([['age', '>=', '39'], ['age', '<=', '45']])->count();

		$age_46_100 = table::people()->where('age', '>=', '46')->count();
		
		if($age_18_24 == null) {$age_18_24 = 0;};

		if($age_25_31 == null) {$age_25_31 = 0;};

		if($age_32_38 == null) {$age_32_38 = 0;};

		if($age_39_45 == null) {$age_39_45 = 0;};

		if($age_46_100 == null) {$age_46_100 = 0;};	

		$age_group = $age_18_24.','.$age_25_31.','.$age_32_38.','.$age_39_45.','.$age_46_100;

		$company_counts = null; 

		$genders_counts = null;

		$civilstatus_counts = null;

		$year_hired_counts = null;

		$departments_counts = null;

		# company stats
		foreach ($employee as $company) { 
			$companies[] = $company->company; 
			$company_counts = array_count_values($companies); 
		}

		$company_stats = ($company_counts == null) ? null : implode(', ', $company_counts) . ',' ;

		# department stats
		foreach ($employee as $department) { 
			$departments[] = $department->department; 
			$departments_counts = array_count_values($departments); 
		}

		$department_stats = ($departments_counts == null) ? null : implode(', ', $departments_counts) . ',' ;

		# gender stats
		foreach ($employee as $gender) { 
			$genders[] = $gender->gender; 
			$genders_counts = array_count_values($genders); 
		}

		$gender_stats = ($genders_counts == null) ? null : implode(', ', $genders_counts) . ',' ;

		# civil status stats
		foreach ($employee as $civilstatus) { 
			$civilstatuses[] = $civilstatus->civilstatus; 
			$civilstatus_counts = array_count_values($civilstatuses); 
		}

		$civilstatus_stats = ($civilstatus_counts == null) ? null : implode(', ', $civilstatus_counts) . ',' ;

		# employee hired dates stats
		foreach ($employee as $yearhired) 
		{
			$year[] = date("Y", strtotime($yearhired->startdate));

			asort($year); 

			$year_hired_counts = array_count_values($year);
		}

		$year_hired_stats = ($year_hired_counts == null) ? null : implode(', ', $year_hired_counts) . ',' ;

		# update report last viewed date
		table::reportviews()->where('report_id', 5)->update(array('last_viewed' => $today));

		return view('admin.reports-overview', [
			'employee_data' => $employee_data,
			'age_group' => $age_group,
			'gender_stats' => $gender_stats,
			'genders_counts' => $genders_counts,
			'civilstatus_stats' => $civilstatus_stats,
			'civilstatus_counts' => $civilstatus_counts,
			'year_hired_stats' => $year_hired_stats,
			'year_hired_counts' => $year_hired_counts,
			'department_stats' => $department_stats,
			'departments_counts' => $departments_counts,
			'company_stats' => $company_stats,
			'company_counts' => $company_counts,
		]);
	}

	public function birthdays(Request $request) 
	{
		if (permission::permitted('reports')=='fail'){ return redirect()->route('denied'); }

		$today = date('M, d Y');
		
		$employee = table::people()->join('company_data', 'people.id', '=', 'company_data.reference')->get();
		
		# update report last viewed date
		table::reportviews()->where('report_id', 7)->update(['last_viewed' => $today]);

		return view('admin.reports-birthdays', ['employee' => $employee]);
	}

	public function employees(Request $request) 
	{
		if (permission::permitted('reports')=='fail'){ return redirect()->route('denied'); }

		$today = date('M, d Y');

		$employee = table::people()->get();

		# update report last viewed date
		table::reportviews()->where('report_id', 1)->update(['last_viewed' => $today]);

		return view('admin.reports-employees', ['employee' => $employee]);
	}

	public function users(Request $request) 
	{
		if (permission::permitted('reports')=='fail'){ return redirect()->route('denied'); }
		
		$today = date('M, d Y');

		$users = table::users()->get();
		
		# update report last viewed date
		table::reportviews()->where('report_id', 6)->update(['last_viewed' => $today]);

		return view('admin.reports-users', ['users' => $users]);
	}
}
