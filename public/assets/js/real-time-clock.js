/*
* Workday - A time clock application for employees
* URL: https://codecanyon.net/item/workday-a-time-clock-application-for-employees/23076255
* Support: official.codefactor@gmail.com
* Version: 3.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
(function() {
    'use strict';

    // variables for time clock
    var current_time = document.getElementById('current-time');
    var current_date = document.getElementById('current-date');
    var current_day = document.getElementById('current-day');

    // time function to prevent the 1s delay
    var setTime = function() {
        // initialize clock with timezone
        var time = moment();

        // set your date and time language here, english is default locale
        moment.locale();

        // example: for spanish language add 'es' to moment.locale()
        // moment.locale('es');

        // set time in html
        if (timeformat == 12) {
            current_time.innerHTML = time.tz(timezone).format("hh:mm:ss A");
        } else {
            current_time.innerHTML = time.tz(timezone).format("kk:mm:ss");
        }

        // set date in html
        current_date.innerHTML = time.tz(timezone).format('MMMM D, YYYY');

        // set day in html
        current_day.innerHTML = time.tz(timezone).format('ddd');
    }

    setTime();
    setInterval(setTime, 1000);
})();