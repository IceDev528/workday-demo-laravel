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

    $('select[name="type"]').on('change', function() {
        $('select[name="type"] option').each(function() {
            var value = $('select[name="type"]').val();

            if ($(this).val() == value) {
                var id = $(this).attr('data-id');
                $('input[name="typeid"]').val(id);
            };
        });
    });
})();