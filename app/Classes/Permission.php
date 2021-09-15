<?php
/*
* Workday - A time clock application for employees
* URL: https://codecanyon.net/item/workday-a-time-clock-application-for-employees/23076255
* Support: official.codefactor@gmail.com
* Version: 3.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
namespace App\Classes;

use App\Models\Permissions;
use Auth;

Class Permission {

    public static $perms = [
        1 => 'dashboard',
        2 => 'employees',
            21 => 'employee-view',
            22 => 'employee-add',
            23 => 'employee-edit',
            24 => 'employee-delete',
            25 => 'employee-archive',
        3 => 'attendance',
            31 => 'attendance-edit',
            32 => 'attendance-delete',
        4 => 'schedules',
            41 => 'schedule-add',
            42 => 'schedule-edit',
            43 => 'schedule-delete',
            44 => 'schedule-archive',
        5 => 'leaves',
            51 => 'leave-edit',
            52 => 'leave-delete',
        // 6 => 'payroll',
            // 61 => 'payroll-edit',
        7 => 'reports',
        8 => 'users',
            81 => 'user-add',
            82 => 'user-edit',
            83 => 'user-delete',
        9 => 'settings',
            91 => 'settings-update',
        10 => 'roles',
            101 => 'role-add',
            102 => 'role-edit',
            103 => 'role-permission',
            104 => 'role-delete',
        11 => 'company',
            111 => 'company-add',
            112 => 'company-delete',
        12 => 'departments',
            121 => 'departments-add',
            122 => 'departments-delete',
        13 => 'jobtitles',
            131 => 'jobtitles-add',
            132 => 'jobtitles-delete',
        14 => 'leavetypes',
            141 => 'leavetypes-add',
            142 => 'leavetypes-delete',
        15 => 'leavegroups',
            151 => 'leavegroup-add',
            152 => 'leavegroup-edit',
            153 => 'leavegroup-delete',
    ];

    public static function permitted($page) 
    {
        $role = \Auth::user()->role_id;
        
        $perms = self::$perms;
        
        $permid = array_search($page, $perms);
        
        $permcheck = Permissions::where('role_id', $role)->where('perm_id', $permid)->first();

        if ($permcheck == NULL) 
        {
            return "fail";
        } else {
            if ($permcheck->perm_id < 0) 
            {
                return "fail";
            } else { 
                return "success";
            }
        }
    }

}