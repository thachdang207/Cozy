const ajax = (url, type, data, todo) => {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // e.preventDefault();
    $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: "JSON",
        success: function(data) {
            todo(data);
        },
        error: function(data) {
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
    });
};
const createCriteria = data => {
    if ($.isEmptyObject(data.error)) {
        checkbox = [];
        $("#criteriaModal").modal("hide");
        $("#users-table")
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
const updateUser = data => {
    if ($.isEmptyObject(data.error)) {
        $("#myModal").modal("hide");
        $("#users-table")
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
};
const deleteUser = data => {
    if ($.isEmptyObject(data.error)) {
        $("#users-table")
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
const tickCriteriaForUser = data => {
    let ticks = data.data;
    $(".checkbox").prop("checked", false);
    ticks.map(tick => {
        $("#check" + tick).prop("checked", true);
    });
};
$(function() {
    var checkbox = new Array();
    var listCriteria, user_id, date, criterion_id;
    $("#users-table").DataTable({
        drawCallback: function() {
            // let pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
            // let info = $(this).closest('.dataTables_wrapper').find('.dataTables_info');
            // pagination.toggle(this.api().page.info().pages > 0);
            // info.toggle(this.api().page.info().pages > 0);
        },
        order: [[9, "desc"]],
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
            url: "/users/data-table", //,"{{ route('shops.data') }}",
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
                data: "full_address",
                name: "full_address"
            },
            {
                data: "gender",
                name: "gender"
            },
            {
                data: "birthday",
                name: "birthday"
            },
            {
                data: "email",
                name: "email"
            },
            {
                data: "phone_number",
                name: "phone_number"
            },
            {
                data: "department_id",
                name: "department_id"
            },
            {
                data: "role_id",
                name: "role_id"
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
                        '<div class="d-flex justify-content-around"><button type="button" class="btn btn-warning editUser" data-toggle="modal" data-target="#myModal" id="listUsers" value="' +
                        row.id +
                        '"><i class="fa fa-wrench" aria-hidden="true"></i></button>' +
                        '<button type="button" class="btn btn-info criteria mx-1" data-toggle="modal" data-target="#criteriaModal" id="listUsers" value="' +
                        row.id +
                        '"><i class="fas fa-seedling"></i></button>' +
                        '<button type="button" class="btn btn-danger deleteUser" id="deleteUser" value="' +
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
        pageLength: 5,
        responsive: true
        //bDestroy:true,
    });
    $("#valueSearch").keypress(function(event) {
        var keycode = event.keyCode ? event.keyCode : event.which;
        if (keycode == "13") {
            $("#users-table")
                .DataTable()
                .draw(true);
        }
    });
    $("#btnSearch").click(function() {
        $("#users-table")
            .DataTable()
            .draw(true);
    });
    $("#users-table").on("click", ".editUser", function(e) {
        var id = $(this).val();
        $("span").empty();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('input[name="_token"]').val()
            }
        });
        e.preventDefault();
        $.ajax({
            url: "/users/" + id + "/edit",
            type: "get",
            data: {
                // id: id,
            },
            dataType: "JSON",
            success: function(data) {
                $("#id").val(data.data.id);
                $("#name").val(data.data.name);
                $("#full_address").val(data.data.full_address);
                data.data.gender == 1
                    ? $("#male").attr("checked", true)
                    : $("#female").attr("checked", true);
                $("#birthday").val(data.data.birthday);
                $("#email").val(data.data.email);
                $("#phone_number").val(data.data.phone_number);
                $("#department_id").val(data.data.department_id);
            },
            error: function(data) {
                //$("#inra").append("failed");
                alert("failed");
            }
        });
    });
    $("#users-table").on("click", ".criteria", function(e) {
        user_id = $(this).val();
        var name = $(this)
            .closest("tr")
            .find(".name")
            .text();
        $("#setName").html("<b>Name:</b> " + name);
        // $("#id").val(id);
        $('input[name="id"]').val(user_id);
        var now = new Date();

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);

        var today = now.getFullYear() + "-" + month + "-" + day;
        $("#date_criteria").val(today);
        ajax(
            `/historical-criteria/${user_id}/user?date=${today}`,
            "GET",
            "",
            tickCriteriaForUser
        );
    });
    $("#date_criteria").on("input change", function(e) {
        // $("#check1").prop("checked", true);
        $(".checkbox").prop("checked", false);
        date = $("#date_criteria").val();
        checkbox.filter(function(criterion) {
            if (criterion.date.indexOf(date) !== -1) {
                $("#check" + criterion.criterion_id).prop("checked", true);
            }
        });
    });
    $(".checkbox").change(function() {
        if (this.checked) {
            date = $("#date_criteria").val();
            user_id = $('input[name="id"]').val();
            criterion_id = $(this).val();
            criterion = {
                user_id: user_id,
                criterion_id: criterion_id,
                date: date
            };
            checkbox.push(criterion);
        } else {
            checkbox.filter(function(criterion) {
                if (criterion.criterion_id.indexOf(criterion_id) !== -1) {
                    checkbox.splice(criterion, 1);
                }
            });
        }
        console.log(checkbox);
    });
    $(document).on("click", "#createCriteria", function(e) {
        console.log(JSON.stringify(checkbox));
        e.preventDefault();
        ajax(
            "/historical-criteria",
            "post",
            { checkbox: JSON.stringify(checkbox) },
            createCriteria
        );
        checkbox = [];
        $(".checkbox").prop("checked", false);
    });
    $(document).on("click", "#update", function(e) {
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
        e.preventDefault();
        const value = {
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
        };
        ajax("/users/update", "post", value, updateUser);
    });

    $("#users-table").on("click", ".deleteUser", function(e) {
        var id = $(this).val();
        e.preventDefault();
        ajax("/users/" + id, "DELETE", {}, deleteUser);
    });
    $("#date_criteria").change(function() {
        var date = $(this).val();
        ajax(
            `/historical-criteria/${user_id}/user?date=${date}`,
            "GET",
            "",
            tickCriteriaForUser
        );
    });
});
