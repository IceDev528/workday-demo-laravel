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


class PersonalProfileController extends Controller
{
	public function index() 
	{
        $id = \Auth::user()->reference;

		$profile = table::people()->where('id', $id)->first();

		$company_data = table::companydata()->where('reference', $id)->first();

		$profile_photo = table::people()->select('avatar')->where('id', $id)->value('avatar');

		$leavetype = table::leavetypes()->get();

		$leavegroup = table::leavegroup()->get();

        return view('personal.profile', [
        	'profile' => $profile,
        	'company_data' => $company_data,
        	'profile_photo' => $profile_photo,
        	'leavetype' => $leavetype,
        	'leavegroup' => $leavegroup
        ]);
    }
	   
	public function edit() 
	{
		$id = \Auth::user()->reference;

		$person_details = table::people()->where('id', $id)->first();

		return view('personal.edits.profile-edit', ['person_details' => $person_details]);
	}

	public function update(Request $request) 
	{
		$v = $request->validate([
			'lastname' => 'required|max:155',
			'firstname' => 'required|max:155',
			'mi' => 'required|max:155',
			'age' => 'required|digits_between:0,199|max:3',
			'gender' => 'required|alpha|max:155',
			'emailaddress' => 'required|email|max:155',
			'civilstatus' => 'required|alpha|max:155',
			'mobileno' => 'required|max:155',
			'birthday' => 'required|date|max:155',
			'birthplace' => 'required|max:255',
			'homeaddress' => 'required|max:255',
		]);

		$id = \Auth::user()->reference;
		$lastname = mb_strtoupper($request->lastname);
		$firstname = mb_strtoupper($request->firstname);
		$mi = mb_strtoupper($request->mi);
		$age = $request->age;
		$gender = mb_strtoupper($request->gender);
		$emailaddress = mb_strtolower($request->emailaddress);
		$civilstatus = mb_strtoupper($request->civilstatus);
		$mobileno = $request->mobileno;
		$birthday = date("Y-m-d", strtotime($request->birthday));
		$birthplace = mb_strtoupper($request->birthplace);
		$homeaddress = mb_strtoupper($request->homeaddress);

		table::people()->where('id', $id)->update([
			'lastname' => $lastname,
			'firstname' => $firstname,
			'mi' => $mi,
			'age' => $age,
			'gender' => $gender,
			'emailaddress' => $emailaddress,
			'civilstatus' => $civilstatus,
			'mobileno' => $mobileno,
			'birthday' => $birthday,
			'birthplace' => $birthplace,
			'homeaddress' => $homeaddress,
		]);

    	return redirect('personal/profile')->with('success', trans("Update was successful"));
	}
}

