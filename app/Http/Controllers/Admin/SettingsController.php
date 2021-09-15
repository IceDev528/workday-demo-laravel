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
use Auth;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function settings(Request $request) 
    {
        if (permission::permitted('settings')=='fail'){ return redirect()->route('denied'); }
        
        $data = table::settings()->where('id', 1)->first();
        
        return view('admin.settings', ['data' => $data]);
    }

    public function update(Request $request) 
    {
        if (permission::permitted('settings-update')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'timezone' => 'required|timezone|max:100',
            'time_format' => 'max:2',
            'iprestriction' => 'max:1600',
            'rfid' => 'max:2',
        ]);

        $timezone = $request->timezone;

        $time_format = $request->time_format;

        $iprestriction = $request->iprestriction;

        $rfid = $request->rfid;
        
        if ($timezone != null) 
        {
            $settings_timezone = table::settings()->where('id', 1)->value('timezone');

            $path = base_path('.env');
            
            if(file_exists($path)) 
            {
                file_put_contents($path, str_replace('APP_TIMEZONE='.$settings_timezone, 'APP_TIMEZONE='.$timezone, file_get_contents($path)));
            }
        }

        table::settings()->where('id', 1)->update([
            'timezone' => $timezone,
            'time_format' => $time_format,
            'iprestriction' => $iprestriction,
            'rfid' => $rfid,
        ]);
        
        return redirect('admin/settings')->with('success', trans("Update was successful"));
    }

}
