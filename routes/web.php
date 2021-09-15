<?php
/*
* Workday - A time clock application for employees
* URL: https://codecanyon.net/item/workday-a-time-clock-application-for-employees/23076255
* Support: official.codefactor@gmail.com
* Version: 3.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\FormOptionsController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Personal\PersonalDashboardController;
use App\Http\Controllers\Personal\PersonalAccountController;
use App\Http\Controllers\Personal\PersonalAttendanceController;
use App\Http\Controllers\Personal\PersonalLeaveController;
use App\Http\Controllers\Personal\PersonalProfileController;
use App\Http\Controllers\Personal\PersonalScheduleController;
use App\Http\Controllers\Personal\PersonalSettingsController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ClockController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Welcome Login Page
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthenticatedSessionController::class, 'welcome_login'])->name('login');

/*
|--------------------------------------------------------------------------
| Universal SmartClock has clock-in and clock-out functions 
|--------------------------------------------------------------------------
*/
Route::get('webclock', [ClockController::class, 'index']);
Route::post('webclock/clocking', [ClockController::class, 'clocking']);

/*
|--------------------------------------------------------------------------
| Protected Routes Requires Authentication, and User Account Approval
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::middleware(['checkstatus'])->group(function () {

        Route::middleware(['admin'])->group(function () {
            /*
            |--------------------------------------------------------------------------
            | Dashboard 
            |--------------------------------------------------------------------------
            */
            Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

            /*
            |--------------------------------------------------------------------------
            | Employees 
            |--------------------------------------------------------------------------
            */
            Route::get('admin/employee', [EmployeeController::class, 'index'])->name('admin-employee');
            Route::get('admin/employee/add', [EmployeeController::class, 'add']);
            Route::post('admin/employee/store', [EmployeeController::class, 'store']);
            Route::get('admin/employee/view/{id}', [EmployeeController::class, 'view']);
            Route::get('admin/employee/edit/{id}', [EmployeeController::class, 'edit']);
            Route::post('admin/employee/update', [EmployeeController::class, 'update']);
            Route::get('admin/employee/archive/{id}', [EmployeeController::class, 'archive']);
            Route::get('admin/employee/delete/{id}', [EmployeeController::class, 'delete']);

            /*
            |--------------------------------------------------------------------------
            | Employee Attendance 
            |--------------------------------------------------------------------------
            */
            Route::get('admin/attendance', [AttendanceController::class, 'index'])->name('admin-attendance');
            Route::post('admin/attendance', [AttendanceController::class, 'filter']);
            Route::get('admin/attendance/manual-entry', [AttendanceController::class, 'add']);
            Route::post('admin/attendance/add-entry', [AttendanceController::class, 'entry']);
            Route::get('admin/attendance/delete/{id}', [AttendanceController::class, 'delete']);
            
            /*
            |--------------------------------------------------------------------------
            | Employee Schedules 
            |--------------------------------------------------------------------------
            */
            Route::get('admin/schedule', [ScheduleController::class, 'index'])->name('admin-schedule');
            Route::post('admin/schedule', [ScheduleController::class, 'filter']);
            Route::get('admin/schedule/add', [ScheduleController::class, 'add']);
            Route::post('admin/schedule/store', [ScheduleController::class, 'store']);
            Route::get('admin/schedule/edit/{id}', [ScheduleController::class, 'edit']);
            Route::post('admin/schedule/update', [ScheduleController::class, 'update']);
            Route::get('admin/schedule/delete/{id}', [ScheduleController::class, 'delete']);
            Route::get('admin/schedule/archive/{id}', [ScheduleController::class, 'archive']);

            /*
            |--------------------------------------------------------------------------
            | Employee Leaves 
            |--------------------------------------------------------------------------
            */
            Route::get('admin/leave', [LeaveController::class, 'index'])->name('admin-leave');
            Route::post('admin/leave', [LeaveController::class, 'filter']);
            Route::get('admin/leave/edit/{id}', [LeaveController::class, 'edit']);
            Route::post('admin/leave/update', [LeaveController::class, 'update']);
            Route::get('admin/leave/delete/{id}', [LeaveController::class, 'delete']);

            /*
            |--------------------------------------------------------------------------
            | Reports 
            |--------------------------------------------------------------------------
            */
            Route::get('admin/reports', [ReportController::class, 'index'])->name('admin-reports');
            Route::get('admin/reports/company-overview', [ReportController::class, 'overview']);
            Route::get('admin/reports/employee-birthdays', [ReportController::class, 'birthdays']);
            Route::get('admin/reports/employee-list', [ReportController::class, 'employees']);
            Route::get('admin/reports/user-accounts', [ReportController::class, 'users']);

            /*
            |--------------------------------------------------------------------------
            | Export Reports 
            |--------------------------------------------------------------------------
            */
            Route::get('export/report/employees', [ExportController::class, 'employees']);
            Route::get('export/report/birthdays', [ExportController::class, 'birthdays']);
            Route::get('export/report/accounts', [ExportController::class, 'users']);

            /*
            |--------------------------------------------------------------------------
            | Users 
            |--------------------------------------------------------------------------
            */
            Route::get('admin/users', [UserController::class, 'index'])->name('admin-users');
            Route::get('admin/users/add', [UserController::class, 'add']);
            Route::post('admin/users/register', [UserController::class, 'register']);
            Route::get('admin/users/edit/{id}', [UserController::class, 'edit']);
            Route::post('admin/users/update', [UserController::class, 'update']);
            Route::get('admin/users/delete/{id}', [UserController::class, 'delete']);

            /*
            |--------------------------------------------------------------------------
            | User Roles 
            |--------------------------------------------------------------------------
            */
            Route::get('admin/user/roles', [RoleController::class, 'index'])->name('admin-roles');
            Route::get('admin/user/roles/add', [RoleController::class, 'add']);
            Route::post('admin/user/roles/store', [RoleController::class, 'store']);
            Route::get('admin/user/roles/edit/{id}', [RoleController::class, 'edit']);
            Route::post('admin/user/roles/update', [RoleController::class, 'update']);
            Route::get('admin/user/roles/delete/{id}', [RoleController::class, 'delete']);
            Route::get('admin/user/roles/permission/edit/{id}', [RoleController::class, 'editpermission']);
            Route::post('admin/user/roles/permission/update', [RoleController::class, 'updatepermission']);

            /*
            |--------------------------------------------------------------------------
            | User Account 
            |--------------------------------------------------------------------------
            */
            Route::get('admin/account', [AccountController::class, 'account'])->name('account');
            Route::post('admin/update/user', [AccountController::class, 'updateUser']);
            Route::post('admin/update/password', [AccountController::class, 'updatePassword']);

            /*
            |--------------------------------------------------------------------------
            | Settings 
            |--------------------------------------------------------------------------
            */
            Route::get('admin/settings', [SettingsController::class, 'settings'])->name('admin-settings');
            Route::post('admin/settings/update', [SettingsController::class, 'update']);

            /*
            |--------------------------------------------------------------------------
            | Form Options 
            |--------------------------------------------------------------------------
            */
            # Company
            Route::get('admin/company/', [FormOptionsController::class, 'company'])->name('company');
            Route::post('admin/company/add', [FormOptionsController::class, 'addCompany']);
            Route::get('admin/company/delete/{id}', [FormOptionsController::class, 'deleteCompany']);

            # Department
            Route::get('admin/department', [FormOptionsController::class, 'department'])->name('department');
            Route::post('admin/department/add', [FormOptionsController::class, 'addDepartment']);
            Route::get('admin/department/delete/{id}', [FormOptionsController::class, 'deleteDepartment']);

            # Job Title
            Route::get('admin/jobtitle', [FormOptionsController::class, 'jobtitle'])->name('jobtitle');
            Route::post('admin/jobtitle/add', [FormOptionsController::class, 'addJobtitle']);
            Route::get('admin/jobtitle/delete/{id}', [FormOptionsController::class, 'deleteJobtitle']);

            # Leave Types
            Route::get('admin/leavetype', [FormOptionsController::class, 'leavetype'])->name('leavetype');
            Route::post('admin/leavetype/add', [FormOptionsController::class, 'addLeavetype']);
            Route::get('admin/leavetype/delete/{id}', [FormOptionsController::class, 'deleteLeavetype']);

            # Leave Group
            Route::get('admin/leavegroups', [FormOptionsController::class, 'leaveGroups'])->name('leavegroup');
            Route::get('admin/leavegroups/add', [FormOptionsController::class, 'addLeaveGroups']);
            Route::post('admin/leavegroups/store', [FormOptionsController::class, 'storeLeaveGroups']);
            Route::get('admin/leavegroups/edit/{id}', [FormOptionsController::class, 'editLeaveGroups']);
            Route::post('admin/leavegroups/update', [FormOptionsController::class, 'updateLeaveGroups']);
            Route::get('admin/leavegroups/delete/{id}', [FormOptionsController::class, 'deleteLeaveGroups']);

        });

        Route::middleware(['employee'])->group(function () {
            /*
            |--------------------------------------------------------------------------
            | Employee Portal : Dashboard, Profile, Attendance, Schedules, Leaves, Settings
            |--------------------------------------------------------------------------
            */
            # attendance 
            Route::get('personal/dashboard', [PersonalDashboardController::class, 'index'])->name('personal-dashboard');

            # attendance 
            Route::get('personal/attendance', [PersonalAttendanceController::class, 'index'])->name('personal-attendance');
            Route::post('personal/attendance', [PersonalAttendanceController::class, 'filter']);

            # schedule 
            Route::get('personal/schedule', [PersonalScheduleController::class, 'index'])->name('personal-schedule');
            Route::post('personal/schedule', [PersonalScheduleController::class, 'filter']);

            # leave 
            Route::get('personal/leave', [PersonalLeaveController::class, 'index'])->name('personal-leave');
            Route::post('personal/leave', [PersonalLeaveController::class, 'filter']);
            Route::get('personal/leave/add', [PersonalLeaveController::class, 'add']);
            Route::post('personal/leave/request', [PersonalLeaveController::class, 'request']);
            Route::get('personal/leave/edit/{id}', [PersonalLeaveController::class, 'edit']);
            Route::post('personal/leave/update', [PersonalLeaveController::class, 'update']);
            Route::get('personal/leave/view/{id}', [PersonalLeaveController::class, 'view']);
            Route::get('personal/leave/delete/{id}', [PersonalLeaveController::class, 'delete']);

            # profile 
            Route::get('personal/profile', [PersonalProfileController::class, 'index'])->name('personal-profile');
            Route::get('personal/profile/edit/', [PersonalProfileController::class, 'edit']);
            Route::post('personal/profile/update', [PersonalProfileController::class, 'update']);

            # user 
            Route::get('personal/account', [PersonalAccountController::class, 'account'])->name('personal-account');
            Route::post('personal/update/user', [PersonalAccountController::class, 'updateUser']);
            Route::post('personal/update/password', [PersonalAccountController::class, 'updatePassword']);

            # settings 
            Route::get('personal/settings', [PersonalSettingsController::class, 'index'])->name('personal-settings');
        });

    });

});

/*
|--------------------------------------------------------------------------
| extra routes
|--------------------------------------------------------------------------
*/
Route::get('lang/{locale}', [LanguageController::class, 'lang']);
Route::get('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
Route::view('permission-denied', 'errors.permission-denied')->name('denied');
Route::view('account-disabled', 'errors.account-disabled')->name('disabled');
Route::view('account-not-found', 'errors.account-not-found')->name('notfound');

/*
|--------------------------------------------------------------------------
| auth routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
