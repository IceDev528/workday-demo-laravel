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
use App\Http\Controllers\Controller;

class PersonalAttendanceController extends Controller
{
    public function index() 
    {
        $idno = \Auth::user()->idno;

        $data = table::attendance()->where('idno', $idno)->limit(250)->get();

        $time_format = table::settings()->value("time_format");

        return view('personal.attendance', ['attendance' => $data, 'time_format' => $time_format]);
    }

    public function filter(Request $request)
    {
        $idno = \Auth::user()->idno;

        $v = $request->validate([
            'start' => 'required|max:255',
            'end' => 'required|max:255'
        ]);

        $start = $request->start;

        $end = $request->end;

        $time_format = table::settings()->value("time_format");

        $data = table::attendance()->where('idno', $idno)->whereBetween('date', ["$start", "$end"])->get();

        return view('personal.attendance', ['attendance' => $data, 'time_format' => $time_format]);
    }
}

