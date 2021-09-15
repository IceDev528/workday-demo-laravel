<?php
/*
* Workday - A time clock application for employees
* URL: https://codecanyon.net/item/workday-a-time-clock-application-for-employees/23076255
* Support: official.codefactor@gmail.com
* Version: 3.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
namespace App\Http\Controllers\personal;

use DB;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class PersonalDashboardController extends Controller
{

    public function index() 
    {
        $id = \Auth::user()->reference;
        
        $start_month = date('Y/m/01');

        $end_month = date('Y/m/31');

        $time_format = table::settings()->value("time_format");

        $current_schedule = table::schedules()->where([['reference', $id], ['archive', '0']])->first();

        $previous_schedules = table::schedules()->where([['reference', $id],['archive', '1'],])->take(8)->get();

        $leaves_approved_count = table::leaves()->where([['reference', $id], ['status', 'Approved']])->count();

        $leaves_pending_count = table::leaves()->where([['reference', $id], ['status', 'Declined']])->orWhere([['reference', $id], ['status', 'Pending']])->count();

        $recent_approved_leaves = table::leaves()->where([['reference', $id], ['status', 'Approved']])->take(8)->get();

        $attendance_late_count = table::attendance()->where([['reference', $id], ['status_timein', 'Late In']])->whereBetween('date', [$start_month, $end_month])->count();

        $attendance_early_out_count = table::attendance()->where([['reference', $id], ['status_timeout', 'Early Out']])->whereBetween('date', [$start_month, $end_month])->count();

        $recent_attendance = table::attendance()->where('reference', $id)->latest('date')->take(4)->get();

        return view('personal.dashboard', [
            'current_schedule' => $current_schedule,
            'previous_schedules' => $previous_schedules,
            'time_format' => $time_format,
            'leaves_approved_count' => $leaves_approved_count,
            'recent_approved_leaves' => $recent_approved_leaves,
            'leaves_pending_count' => $leaves_pending_count,
            'recent_attendance' => $recent_attendance,
            'attendance_late_count' => $attendance_late_count,
            'attendance_early_out_count' => $attendance_early_out_count,
        ]);
    }

}

