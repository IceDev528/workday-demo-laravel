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

class DashboardController extends Controller
{
    public function index() 
    {
        if (permission::permitted('dashboard')=='fail'){ return redirect()->route('denied'); }
        
        $datenow = date('Y-m-d'); 

        $is_online = table::attendance()->where('date', $datenow)->pluck('idno');

        $employee_is_online_array = json_decode(json_encode($is_online), true);

        $is_online_now = count($is_online); 

        $employee_ids = table::companydata()->pluck('idno');

        $employee_ids_array = json_decode(json_encode($employee_ids), true); 

        $is_offline_now = count(array_diff($employee_ids_array, $employee_is_online_array));

        $time_format = table::settings()->value("time_format");
        
        $recent_employees = table::people()->join('company_data', 'people.id', '=', 'company_data.reference')->where('people.employmentstatus', 'Active')->orderBy('company_data.startdate', 'desc')->take(8)->get();

        $employee_regular = table::people()->where('employmenttype', 'Regular')->where('employmentstatus', 'Active')->count();

        $employee_trainee = table::people()->where('employmenttype', 'Trainee')->where('employmentstatus', 'Active')->count();

        $employee_active = table::people()->where('employmentstatus', 'Active')->count();

        $recent_attendance = table::attendance()->latest('date')->take(4)->get();
        
        $recent_leaves = table::leaves()->where('status', 'Approved')->orderBy('leavefrom', 'desc')->take(8)->get();

        $employee_leaves_approved_count = table::leaves()->where('status', 'Approved')->count();

        $employee_leaves_pending_count = table::leaves()->where('status', 'Pending')->count();

        $employee_leaves_count = table::leaves()->where('status', 'Approved')->orWhere('status', 'Pending')->count();

        return view('admin.dashboard', [
            'time_format' => $time_format,
            'employee_regular' => $employee_regular,
            'employee_trainee' => $employee_trainee,
            'employee_active' => $employee_active,
            'employee_leaves_pending_count' => $employee_leaves_pending_count,
            'employee_leaves_approved_count' => $employee_leaves_approved_count,
            'employee_leaves_count' => $employee_leaves_count,
            'recent_leaves' => $recent_leaves,
            'recent_employees' => $recent_employees,
            'recent_attendance' => $recent_attendance,
            'is_offline_now' => $is_offline_now,
            'is_online_now' => $is_online_now,
        ]);
    }

}
