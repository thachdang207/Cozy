$(function() {
    $("#report-table").DataTable({
        drawCallback: function() {
            // let pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
            // let info = $(this).closest('.dataTables_wrapper').find('.dataTables_info');
            // pagination.toggle(this.api().page.info().pages > 0);
            // info.toggle(this.api().page.info().pages > 0);
        },
        order: [[1, "desc"]],
        processing: true,
        serverSide: true,
        columnDefs: [
            {
                targets: 0,
                className: "name"
            }
        ],
        language: {
            processing: "<div id='loader'>Loading... !!!</div>"
        },
        ajax: {
            url: "/report/data-table",
            type: "GET",
            data: function(d) {
                d.fieldTable = $("#fieldTable option:selected").val();
                d.valueSearch = $("#valueSearch").val();
                d.month = $("#month").val();
            }
        },
        columns: [
            {
                data: "name",
                name: "name"
            },
            {
                data: "point",
                name: "point"
            }
        ],
        //  paging: false,
        //  bFilter: false,

        ordering: true,
        searching: false,
        bLengthChange: false, //thought this line could hide the LengthMenu
        //"bInfo":false,
        pageLength: 5
        //bDestroy:true,
    });
    $("#valueSearch").keypress(function(event) {
        var keycode = event.keyCode ? event.keyCode : event.which;
        if (keycode == "13") {
            $("#report-table")
                .DataTable()
                .draw(true);
        }
    });
    $("#btnSearch").click(function() {
        $("#report-table")
            .DataTable()
            .draw(true);
    });
    $("#month").on("input change", function(e) {
        $("#report-table")
            .DataTable()
            .draw(true);
    });
});
