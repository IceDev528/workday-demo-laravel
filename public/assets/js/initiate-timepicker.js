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

    // 12 hour
    mdtimepicker('.timepicker', { format:'h:mm tt', theme: 'blue', hourPadding: true });
    
    // 24 hour
    // mdtimepicker('.timepicker', { format:'hh:mm', is24hour: true, theme: 'blue', hourPadding: true });

})();