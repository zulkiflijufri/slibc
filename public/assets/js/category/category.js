// set global variable
var update_id;

// list category
let list_category = () => {
    $.ajax({
        url: "http://localhost:8000/api/category/list_category",
        method: "GET",
        success: function (data) {
            console.log(data);
            // loop data
            $.each(data.data, function (k, v) {
                $("#list").append(
                    "<tr>" +
                        "<td>" +
                        (k + 1) +
                        "</td>" +
                        "<td>" +
                        v.name +
                        "</td>" +
                        "<td>" +
                        '<span class="badge badge-pill badge-primary">' +
                        v.jumlah +
                        "</span>" +
                        "</td>" +
                        '<td class="text-right">' +
                        '<div class="dropdown">' +
                        '<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                        '<i class="fas fa-ellipsis-v"></i>' +
                        "</a>" +
                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">' +
                        '<a class="dropdown-item update" id="update" data-id="' +
                        v.id +
                        '" href="#">Edit</a>' +
                        '<a class="dropdown-item delete" id="delete" data-id="' +
                        v.id +
                        '" href="#">Delete</a>' +
                        "</div>" +
                        "</div>" +
                        "</td>" +
                        "</tr>"
                );
            });
        },
    });
};
// call function
list_category();

// function fetch data
let fetch_data = (idX) => {
    $.ajax({
        url: "http://localhost:8000/api/category/fetch_category",
        method: "POST",
        data: { id: idX },
        success: function (data) {
            // set variable
            var dataX = data.data;
            update_id = dataX.id;
            $("#upt-category").val(dataX.name);
        },
    });
};

$("#list-category tbody").on("click", "#update", function () {
    var idX = $(this).data("id");
    $("#label-opt").html("Ubah Kategory");
    $("#btn-update").removeClass("display-0");
    $("#btn-create").addClass("display-0");
    $("#create-opt-hide").removeAttr("hidden");
    fetch_data(idX);
});

$("#opt-create").on("click", function () {
    $("#label-opt").html("Buat Kategory");
    $("#btn-update").addClass("display-0");
    $("#btn-create").removeClass("display-0");
    $("#create-opt-hide").attr("hidden", true);
    $("#upt-category").val("");
});

// update function
$("#btn-update").on("click", function () {
    // validation
    if ($.trim($("#upt-category").val()) == "") {
        alert("Name Category tidak boleh kosong");
        return;
    }
    // set data update
    var data = {
        id: update_id,
        name: $("#upt-category").val(),
    };
    // ajax
    $.ajax({
        url: "http://localhost:8000/api/category/update_category",
        method: "POST",
        data: data,
        success: function (data) {
            location.reload();
        },
    });
});

// create data
$("#btn-create").on("click", function () {
    if ($.trim($("#upt-category").val()) == "") {
        alert("Name Category tidak boleh kosong");
        return;
    }
    $.ajax({
        url: "http://localhost:8000/api/category/add_category",
        method: "POST",
        data: { name: $("#upt-category").val() },
        success: function (data) {
            location.reload();
        },
    });
});

// delete data
$("#list-category tbody").on("click", "#delete", function () {
    var r = confirm("Are you sure ?");
    if (r !== true) return;
    var idX = $(this).data("id");
    // ajax
    $.ajax({
        url: "http://localhost:8000/api/category/delete_category",
        method: "POST",
        data: { id: idX },
        success: function (data) {
            location.reload();
        },
    });
});
