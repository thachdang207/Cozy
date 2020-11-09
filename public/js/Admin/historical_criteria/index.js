$(function() {
    $("#historical-table").DataTable({
        drawCallback: function() {
            // let pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
            // let info = $(this).closest('.dataTables_wrapper').find('.dataTables_info');
            // pagination.toggle(this.api().page.info().pages > 0);
            // info.toggle(this.api().page.info().pages > 0);
        },
        order: [[5, "desc"]],
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
            url: "/historical-criteria/data-table",
            type: "GET",
            data: function(d) {
                d.fieldTable = $("#fieldTable option:selected").val();
                d.valueSearch = $("#valueSearch").val();
                d.month = $("#month").val();
            }
        },
        columns: [
            {
                data: "user_id",
                name: "user_id"
            },
            {
                data: "email",
                name: "email"
            },
            {
                data: "department_id",
                name: "department_id"
            },
            {
                data: "criterion_id",
                name: "criterion_id"
            },
            {
                data: "point",
                name: "point"
            },
            {
                data: "date",
                name: "date"
            },
            {
                data: "created_at",
                name: "created_at"
            },
            {
                mRender: function(data, type, row) {
                    return (
                        '<div class="d-flex justify-content-center"><button type="button" class="btn btn-danger deleteCriteria" id="deleteCriteria" value="' +
                        row.id +
                        '"><i class="fa fa-trash" aria-hidden="true"></i></button></div>'
                    );
                }
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
            $("#historical-table")
                .DataTable()
                .draw(true);
        }
    });
    $("#btnSearch").click(function() {
        $("#historical-table")
            .DataTable()
            .draw(true);
    });
});
