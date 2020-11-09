const ajax = (url, type, data, todo) => {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: "JSON",
        success: function(data) {
            todo(data);
        },
        error: function(data) {
            console.log(data);
            toastr.options = {
                closeButton: false,
                debug: false,
                newestOnTop: false,
                progressBar: false,
                positionClass: "toast-bottom-right",
                preventDuplicates: false,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                timeOut: "5000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut"
            };
            toastr["error"]("There are some problems!");
            // clearError();
        }
    });
};
const editCriterion = data => {
    // $("#id").val(data.data.id);
    // $("#name").val(data.data.name);
    // $("#full_address").val(data.data.full_address);
    // data.data.gender == 1
    //     ? $("#male").attr("checked", true)
    //     : $("#female").attr("checked", true);
    // $("#birthday").val(data.data.birthday);
    // $("#email").val(data.data.email);
    // $("#phone_number").val(data.data.phone_number);
    // $("#department_id").val(data.data.department_id);
};
const deleteCriterion = data => {
    if ($.isEmptyObject(data.error)) {
        $("#criteria-table")
            .DataTable()
            .draw(true);
        toastr.options = {
            closeButton: false,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-bottom-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
        data.data
            ? toastr["success"]("The criteria created successfully!")
            : toastr["error"]("There are some problems!");
    } else {
        toastr.options = {
            closeButton: false,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-bottom-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
        toastr["error"]("There are some problems!");
        clearError();
    }
};
$(function() {
    $("#criteria-table").DataTable({
        drawCallback: function() {
            // let pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
            // let info = $(this).closest('.dataTables_wrapper').find('.dataTables_info');
            // pagination.toggle(this.api().page.info().pages > 0);
            // info.toggle(this.api().page.info().pages > 0);
        },
        order: [[3, "asc"]],
        processing: true,
        serverSide: true,
        language: {
            processing: "<div id='loader'>Loading... !!!</div>"
        },
        ajax: {
            url: "/criteria/data-table", //,"{{ route('shops.data') }}",
            type: "GET",
            data: function(d) {
                d.fieldTable = $("#fieldTable option:selected").val();
                d.valueSearch = $("#valueSearch").val();
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
            },
            {
                data: "description",
                name: "description"
            },
            {
                data: "created_at",
                name: "created_at"
            },
            {
                data: "updated_at",
                name: "updated_at"
            },
            {
                mRender: function(data, type, row) {
                    return (
                        '<div class="d-flex justify-content-around"><button type="button" class="btn btn-warning editCriterion" data-toggle="modal" data-target="#myModal" id="listCriteria" value="' +
                        row.id +
                        '"><i class="fa fa-wrench" aria-hidden="true"></i></button>' +
                        '<button type="button" class="btn btn-danger deleteCriterion" id="deleteCriterion" value="' +
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
            $("#criteria-table")
                .DataTable()
                .draw(true);
        }
    });
    $("#btnSearch").click(function() {
        $("#criteria-table")
            .DataTable()
            .draw(true);
    });
    $("#criteria-table").on("click", ".editCriterion", function(e) {
        var id = $(this).val();
        var url = "/criteria/" + id + "/edit";
        e.preventDefault();
        ajax(url, "get", {}, editCriterion);
        $("span").empty();
    });
    $(document).on("click", "#update", function(e) {
        alert($("#department_id").val());
        var _method = $("input[name=_method]").val();
        var _token = $("input[name=_token]").val();
        var id = $("input[name=id]").val();
        var name = $("input[name=name]").val();
        var full_address = $("input[name=full_address]").val();
        var birthday = $("input[name=birthday]").val();
        var email = $("input[name=email]").val();
        var phone_number = $("input[name=phone_number]").val();
        var department_id = $("#department_id").val();
        var gender;
        if ($("#male").is(":checked")) {
            gender = 1;
        } else {
            gender = 2;
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        e.preventDefault();
        $.ajax({
            url: "/criteria/update",
            type: "post",
            data: {
                _method: _method,
                _token: _token,
                id: id,
                name: name,
                full_address: full_address,
                birthday: birthday,
                email: email,
                department_id: department_id,
                phone_number: phone_number,
                gender: gender
            },
            dataType: "JSON",
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    $("#myModal").modal("hide");
                    $("#criteria-table")
                        .DataTable()
                        .draw(true);
                } else {
                    if (data.error.first_office_address) {
                        $("#error_first_office_address").append(
                            '<span class="text-danger" id="error_message">' +
                                data.error.first_office_address +
                                "</span>"
                        );
                    }
                    if (data.error.last_office_address) {
                        $("#error_last_office_address").append(
                            '<span class="text-danger" id="error_message">' +
                                data.error.last_office_address +
                                "</span>"
                        );
                    }
                    if (data.error.brand_name) {
                        $("#error_brand_name").append(
                            '<span class="text-danger" id="error_message">' +
                                data.error.brand_name +
                                "</span>"
                        );
                    }
                    if (data.error.phone_number) {
                        $("#error_phone_number").append(
                            '<span class="text-danger" id="error_message">' +
                                data.error.phone_number +
                                "</span>"
                        );
                    }
                    if (data.error.postal_code) {
                        $("#error_postal_code").append(
                            '<span class="text-danger" id="error_message">' +
                                data.error.postal_code +
                                "</span>"
                        );
                    }
                    if (data.error.site_url) {
                        $("#error_site_url").append(
                            '<span class="text-danger" id="error_message">' +
                                data.error.site_url +
                                "</span>"
                        );
                    }
                    if (data.error.message) {
                        $("#error_message").append(
                            '<span class="text-danger" id="error_message">' +
                                data.error.message +
                                "</span>"
                        );
                    }
                }
            },
            error: function(data) {
                //$("#inra").append("failed");
                alert(data);
            }
        });
    });

    $("#criteria-table").on("click", ".deleteCriterion", function(e) {
        var id = $(this).val();
        var url = "/criteria/" + id;
        e.preventDefault();
        ajax(url, "DELETE", {}, deleteCriterion);
    });
});
