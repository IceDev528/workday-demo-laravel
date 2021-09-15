<?php
/*
* Workday - A time clock application for employees
* URL: https://codecanyon.net/item/workday-a-time-clock-application-for-employees/23076255
* Support: official.codefactor@gmail.com
* Version: 3.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClockController extends Controller
{
    
    public function index()
    {
        $data = table::settings()->where('id', 1)->first();
        
        $timezone = $data->timezone;
        
        $timeformat = $data->time_format;
        
        $rfid = $data->rfid;
        
        return view('webclock', [
            'timezone' => $timezone, 
            'timeformat' => $timeformat, 
            'rfid' => $rfid
        ]);
    }

    public function clocking(Request $request)
    {
        if ($request->idno == null) 
        {
            return response()->json([
                "error" => trans("Please enter your ID number")
            ]);
        }

        if($request->type ==  null) 
        {
            return response()->json([
                "error" => trans("Please click the click-in or clock-out button")
            ]);
        }

        $idno = strtoupper($request->idno);

        $type = $request->type;

        $date = date('Y-m-d');

        $time = date('h:i:s A');

        $ip = $request->ip();

        # ip resriction
        $iprestriction = table::settings()->value('iprestriction');

        if ($iprestriction != null) 
        {
            $ips = explode(",", $iprestriction);

            if(in_array($ip, $ips) == false) 
            {
                return response()->json([
                    "error" => trans("Your device it not registered")
                ]);
            }
        } 

        # employee
        $employee_id = table::companydata()->where('idno', $idno)->value('reference');
        
        if($employee_id == null) 
        {
            return response()->json([
                "error" => trans("Employee not found")
            ]);
        }

        $person = table::people()->where('id', $employee_id)->first();

        $lastname = $person->lastname;

        $firstname = $person->firstname;

        $employee = mb_strtoupper($lastname.', '.$firstname);

        # settings 
        $settings = table::settings()->where('id', 1)->first();
        
        $timezone = $settings->timezone;
        
        $timeformat = $settings->time_format;

        if ($type == 'clockin') 
        {
            $has = table::attendance()->where([['idno', $idno],['date', $date]])->exists();

            if ($has == 1) 
            {
                $hti = table::attendance()->where([['idno', $idno],['date', $date]])->value('timein');

                $hti = date('h:i A', strtotime($hti));

                $hti_24 = ($timeformat == 1) ? $hti : date("H:i", strtotime($hti)) ;

                return response()->json([
                    "error" => trans("You were clocked-in today at")." ".$hti_24,
                ]);

            } else {

                $last_in_notimeout = table::attendance()->where([['idno', $idno],['timeout', NULL]])->count();

                if($last_in_notimeout >= 1)
                {
                    return response()->json([
                        "error" => trans("You are not allowed to clock in twice or more in a day")
                    ]);

                } else {

                    $sched_in_time = table::schedules()->where([['idno', $idno], ['archive', 0]])->value('intime');
                    
                    if($sched_in_time == NULL)
                    {
                        $status_in = null;

                    } else {

                        $sched_clock_in_time_24h = date("H.i", strtotime($sched_in_time));

                        $time_in_24h = date("H.i", strtotime($time));

                        if ($time_in_24h <= $sched_clock_in_time_24h) 
                        {
                            $status_in = trans("In Time");

                        } else {

                            $status_in = trans("Late In");
                        }
                    }

                    table::attendance()->insert([
                        [
                            'idno' => $idno,
                            'reference' => $employee_id,
                            'date' => $date,
                            'employee' => $employee,
                            'timein' => $date." ".$time,
                            'status_timein' => $status_in,
                        ],
                    ]);

                    return response()->json([
                        "type" => $type,
                        "time" => $time,
                        "date" => $date,
                        "employee" => $employee,
                    ]);
                }
            }
        }
        
        if ($type == 'clockout') 
        {
            $timeIN = table::attendance()->where([['idno', $idno], ['timeout', NULL]])->value('timein');

            $clockInDate = table::attendance()->where([['idno', $idno],['timeout', NULL]])->value('date');

            $hasout = table::attendance()->where([['idno', $idno],['date', $date]])->value('timeout');

            $timeOUT = date("Y-m-d h:i:s A", strtotime($date." ".$time));

            if($timeIN == NULL) 
            {
                return response()->json([
                    "error" => trans("You are not clocked-in")
                ]);
            } 

            if ($hasout != NULL) 
            {
                $hto = table::attendance()->where([['idno', $idno],['date', $date]])->value('timeout');

                $hto = date('h:i A', strtotime($hto));

                $hto_24 = ($timeformat == 1) ? $hto : date("H:i", strtotime($hto)) ;

                return response()->json([
                    "error" => trans("You were clocked-out today at")." ".$hto_24,
                ]);

            } else {
                
                $sched_out_time = table::schedules()->where([['idno', $idno], ['archive', 0]])->value('outime');
                
                if($sched_out_time == NULL) 
                {
                    $status_out = null;

                } else {

                    $sched_clock_out_time_24h = date("H.i", strtotime($sched_out_time));

                    $time_out_24h = date("H.i", strtotime($timeOUT));
                    
                    if($time_out_24h >= $sched_clock_out_time_24h) 
                    {
                        $status_out = trans("On Time"); 

                    } else {

                        $status_out = trans("Early Out"); 
                    }
                }

                $time1 = Carbon::createFromFormat("Y-m-d h:i:s A", $timeIN); 
                $time2 = Carbon::createFromFormat("Y-m-d h:i:s A", $timeOUT); 
                $th = $time1->diffInHours($time2);
                $tm = floor(($time1->diffInMinutes($time2) - (60 * $th)));
                $totalhour = $th.".".$tm;

                table::attendance()->where([['idno', $idno],['date', $clockInDate]])->update(array(
                    'timeout' => $timeOUT,
                    'totalhours' => $totalhour,
                    'status_timeout' => $status_out)
                );
                
                return response()->json([
                    "type" => $type,
                    "time" => $time,
                    "date" => $date,
                    "employee" => $employee,
                ]);
            }
        }
    }

}
