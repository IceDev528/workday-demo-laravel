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

class PersonalLeaveController extends Controller
{

    public function index() 
    {
        $idno = \Auth::user()->idno;

        $reference = \Auth::user()->reference;

        $data = table::leaves()->where('idno', $idno)->limit(250)->get();

        $leave_privilege = table::companydata()->where('reference', $reference)->value('leaveprivilege');

        $leave_rights = table::leavegroup()->where('id', $leave_privilege)->value('leaveprivileges');

        $rights = explode(",", $leave_rights);

        $leave_types = table::leavetypes()->get();

        $leave_group = table::leavegroup()->get();

        return view('personal.leave', [
            'leave' => $data, 
            'leave_types' => $leave_types, 
            'leave_group' => $leave_group, 
            'leave_privilege' => $leave_privilege,
            'rights' => $rights,
        ]);
    }

    public function filter(Request $request)
    {
        $v = $request->validate([
            'start' => 'required|max:255',
            'end' => 'required|max:255'
        ]);

        $start = $request->start;

        $end = $request->end;
        
        $idno = \Auth::user()->idno;

        $reference = \Auth::user()->reference;

        $data = table::leaves()->where('idno', $idno)->whereBetween('leavefrom', ["$start", "$end"])->get();

        $leave_privilege = table::companydata()->where('reference', $reference)->value('leaveprivilege');

        $leave_rights = table::leavegroup()->where('id', $leave_privilege)->value('leaveprivileges');

        $rights = explode(",", $leave_rights);

        $leave_types = table::leavetypes()->get();

        $leave_group = table::leavegroup()->get();

        return view('personal.leave', [
            'leave' => $data, 
            'leave_types' => $leave_types, 
            'leave_group' => $leave_group, 
            'leave_privilege' => $leave_privilege,
            'rights' => $rights,
        ]);
    }

    public function add() 
    {
        $reference = \Auth::user()->reference;

        $leave_privilege = table::companydata()->where('reference', $reference)->value('leaveprivilege');

        $leave_rights = table::leavegroup()->where('id', $leave_privilege)->value('leaveprivileges');

        $rights = explode(",", $leave_rights);

        $leave_type = table::leavetypes()->get();

        return view('personal.leave-add', [
            'leave_type' => $leave_type, 
            'leave_rights' => $rights, 
        ]);
    }

    public function request(Request $request)
    {
        $v = $request->validate([
            'type' => 'required|max:100',
            'typeid' => 'required|digits_between:0,999|max:100',
            'leavefrom' => 'required|date|max:15',
            'leaveto' => 'required|date|max:15',
            'returndate' => 'required|date|max:15',
            'reason' => 'required|max:255',
        ]);

        $typeid = $request->typeid;

        $type = mb_strtoupper($request->type);

        $reason = mb_strtoupper($request->reason);

        $leavefrom = date("Y-m-d", strtotime($request->leavefrom));

        $leaveto = date("Y-m-d", strtotime($request->leaveto));

        $returndate = date("Y-m-d", strtotime($request->returndate));

        $id = \Auth::user()->reference;
        
        $idno = \Auth::user()->idno;
        
        $employee = table::people()->where('id', $id)->select('firstname', 'mi', 'lastname')->first();
        
        table::leaves()->insert([
            'reference' => $id,
            'idno' => $idno,
            'employee' => $employee->lastname.', '.$employee->firstname,
            'type' => $type,
            'typeid' => $typeid,
            'leavefrom' => $leavefrom,
            'leaveto' => $leaveto,
            'returndate' => $returndate,
            'reason' => $reason,
            'status' => 'Pending',
        ]);

        return redirect('personal/leave')->with('success', trans("A leave request is submitted"));
    }

    public function edit($id, Request $request) 
    {
        $data = table::leaves()->where('id', $id)->first();

        $leave_type = table::leavetypes()->get();

        $type = $data->type;

        $employee_id = ($data->id == null) ? 0 : Crypt::encryptString($data->id);

        return view('personal.edits.leave-edit', [
            'leave' => $data, 
            'leave_type' => $leave_type, 
            'type' => $type, 
            'employee_id' => $employee_id,
        ]);
    }

    public function update(Request $request)
    {
        $v = $request->validate([
            'id' => 'required|max:200',
            'type' => 'required|max:100',
            'leavefrom' => 'required|date|max:15',
            'leaveto' => 'required|date|max:15',
            'returndate' => 'required|date|max:15',
            'reason' => 'required|max:255',
        ]);

        $id = Crypt::decryptString($request->id);

        $type = mb_strtoupper($request->type);

        $leavefrom = $request->leavefrom;

        $leaveto = $request->leaveto;

        $returndate = $request->returndate;

        $reason = mb_strtoupper($request->reason);

        table::leaves()->where('id', $id)->update([
            'type' => $type,
            'leavefrom' => $leavefrom,
            'leaveto' => $leaveto,
            'reason' => $reason
        ]);

        return redirect('personal/leave')->with('success', trans("Update was successful"));
    }

    public function view($id, Request $request) 
    {
        $data = table::leaves()->where('id', $id)->first();

        return view('personal.leave-view', [
            'leave' => $data, 
        ]);
    }

    public function delete($id, Request $request)
    {
        table::leaves()->where('id', $id)->delete();

        return redirect('personal/leave')->with('success', trans("A leave is successfully deleted"));
    }
}

