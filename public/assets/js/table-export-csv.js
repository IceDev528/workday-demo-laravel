/*
* Workday - A time clock application for employees
* URL: https://codecanyon.net/item/workday-a-time-clock-application-for-employees/23076255
* Support: official.codefactor@gmail.com
* Version: 3.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
(function() {
    'use strict'

    const btnExport = document.getElementById('btnTableExport');

    btnExport.addEventListener('click', function() {
        tableToCSV("workday-export.csv");
    });

    function tableToCSV(filename) {
        var data = [];

        var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++) {
                row.push('"' + cols[j].innerText + '"');
            }

            data.push(row.join(","));
        }

        downloadCSVFile(data.join("\n"), filename);
    };

    function downloadCSVFile(csv, filename) {
        var csv_file, download_link;

        csv_file = new Blob([csv], { type: "text/csv" });

        download_link = document.createElement("a");

        download_link.download = filename;

        download_link.href = window.URL.createObjectURL(csv_file);

        download_link.style.display = "none";

        document.body.appendChild(download_link);

        download_link.click();
    };
})()