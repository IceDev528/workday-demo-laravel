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

use Illuminate\Http\Request;
use App;

class LanguageController extends Controller
{
    public function lang($locale) 
    {
        App::setLocale($locale);
        
        session()->put('locale', $locale);

        if ($locale != null) 
        {
            $path = base_path('.env');
            
            $lang = env('APP_LOCALE');
            
            if(file_exists($path)) 
            {
                file_put_contents($path, str_replace("APP_LOCALE=$lang", "APP_LOCALE=$locale", file_get_contents($path)));
            }
        }

        return redirect()->back();
    }
}
