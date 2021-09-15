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
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function index() 
    {
        if (permission::permitted('schedules')=='fail'){ return redirect()->route('denied'); }
        
        $schedule = table::schedules()->get();

        $employee = table::people()->get();

        $time_format = table::settings()->value("time_format");

        return view('admin.schedule', [
            'schedule' => $schedule,
            'employee' => $employee,
            'time_format' => $time_format
        ]);
    }

    public function add() 
    {
       if (permission::permitted('schedule-add')=='fail'){ return redirect()->route('denied'); }

       $employee = table::people()->get();

       $time_format = table::settings()->value("time_format");

        return view('admin.schedule-add', [
            'employee' => $employee,
            'time_format' => $time_format
        ]);
    }

    public function store(Request $request) 
    {
        if (permission::permitted('schedule-add')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'reference' => 'required|max:20',
            'employee' => 'required|max:100',
            'intime' => 'required|max:15',
            'outime' => 'required|max:15',
            'datefrom' => 'required|date|max:15',
            'dateto' => 'required|date|max:15',
            'hours' => 'required|max:3',
            'restday' => 'required|max:155',
        ]);

    	$id = $request->reference;

		$employee = mb_strtoupper($request->employee);

        $intime = date("h:i A", strtotime($request->intime)) ;

        $outime = date("h:i A", strtotime($request->outime)) ;

		$datefrom = $request->datefrom;

		$dateto = $request->dateto;

		$hours = $request->hours;

        $restday = ($request->restday != null) ? implode(', ', $request->restday) : null ;
        
        $ref = table::schedules()->where([['reference', $id],['archive', 0]])->exists();

        if ($ref == 1) 
        {
            return redirect('admin/schedule')->with('error', trans("The employee has an active schedule please archive the active schedule"));
        }

        $emp_id = table::companydata()->where('reference', $id)->value('idno');
    
        table::schedules()->where('id', $id)->insert([
        	'reference' => $id,
        	'idno' => $emp_id,
        	'employee' => $employee,
        	'intime' => $intime,
        	'outime' => $outime,
        	'datefrom' => $datefrom,
        	'dateto' => $dateto,
        	'hours' => $hours,
        	'restday' => $restday,
        	'archive' => '0',
    	]);

    	return redirect('admin/schedule')->with('success', trans("Successful registration"));
	}

    public function edit($id, Request $request) 
    {
        if (permission::permitted('schedule-edit')=='fail'){ return redirect()->route('denied'); }

        $schedule = table::schedules()->where('id', $id)->first();

        $restdays = explode(', ', $schedule->restday);

        $time_format = table::settings()->value("time_format");
        
        return view('admin.schedule-edit', [
            'schedule' => $schedule,
            'restdays' => $restdays,
            'time_format' => $time_format
        ]);
    }

    public function update(Request $request) 
    {
        if (permission::permitted('schedule-edit')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'reference' => 'required|max:20',
            'employee' => 'required|max:100',
            'intime' => 'required|max:15',
            'outime' => 'required|max:15',
            'datefrom' => 'required|date|max:15',
            'dateto' => 'required|date|max:15',
            'hours' => 'required|max:3',
            'restday' => 'required|max:155',
        ]);

        $id = $request->reference;

        $employee = mb_strtoupper($request->employee);

        $intime = date("h:i A", strtotime($request->intime)) ;

        $outime = date("h:i A", strtotime($request->outime)) ;

        $datefrom = $request->datefrom;

        $dateto = $request->dateto;

        $hours = $request->hours;

        $restday = ($request->restday != null) ? implode(', ', $request->restday) : null ;

        table::schedules()->where('id', $id)->update([
            'intime' => $intime,
            'outime' => $outime,
            'datefrom' => $datefrom,
            'dateto' => $dateto,
            'hours' => $hours,
            'restday' => $restday,
        ]);

        return redirect('admin/schedule')->with('success', trans("Update was successful"));
    }

    public function archive($id, Request $request)
    {
        if (permission::permitted('schedule-archive')=='fail'){ return redirect()->route('denied'); }

		$id = $request->id;
        
		table::schedules()->where('id', $id)->update(['archive' => '1']);

    	return redirect('admin/schedule')->with('success', trans("A schedule is successfully archived"));
   	}

    public function delete($id, Request $request) 
    {
        if (permission::permitted('schedule-delete')=='fail'){ return redirect()->route('denied'); }

        table::schedules()->where('id', $id)->delete();

        return redirect('admin/schedule')->with('success', trans("A schedule is successfully deleted"));
    }
    
    public function filter(Request $request)
    {
        if (permission::permitted('schedules')=='fail'){ return redirect()->route('denied'); }
        
        $v = $request->validate([
            'emp_id' => 'required|max:255',
        ]);
        
        $emp_id = $request->emp_id;

        $employee = table::people()->get();

        $time_format = table::settings()->value("time_format");

        $schedule = table::schedules()->where('reference', $emp_id)->get();
    
        return view('admin.schedule', [
            'schedule' => $schedule, 
            'employee' => $employee, 
            'time_format' => $time_format
        ]);
    }
}