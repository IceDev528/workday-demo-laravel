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

    $('select[name="name"]').on('change', function() {
        $('select[name="name"] option').each(function() {
            var value = $('select[name="name"]').val();

            if ($(this).val() == value) {
                var email = $(this).attr('data-email');
                var ref = $(this).attr('data-ref');
                $('input[name="email"]').val(email);
                $('input[name="ref"]').val(ref);
            };
        });
    });
})();