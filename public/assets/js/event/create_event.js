// create data
let create_event = (_params) => {
    $.ajax({
        url: "http://localhost:8000/api/create_event",
        method: "POST",
        data: _params,
        success: function (data) {
            if (data.meta.code == "200_002") {
                window.location.href = "/admin/events";
            } else {
                alert(data.meta.message);
            }
        },
    });
};

$("#create-event").on("click", function () {
    // validation
    if ($.trim($("#event").val()) == "") {
        alert("Evet tidak boleh kosong");
        return;
    }
    if ($.trim($("#description").val()) == "") {
        alert("Description tidak boleh kosong");
        return;
    }
    if ($.trim($("#date-start").val()) == "") {
        alert("Tanggal mulai tidak boleh kosong");
        return;
    }
    if ($.trim($("#date-end").val()) == "") {
        alert("Tanggal selesai tidak boleh kosong");
        return;
    }
    if ($.trim($("#location").val()) == "") {
        alert("Lokasi tidak boleh kosong");
        return;
    }

    // set data
    var _params = {
        agenda: $("#event").val(),
        description: $("#description").val(),
        start_date: $("#date-start").val(),
        end_date: $("#date-end").val(),
        location: $("#location").val(),
    };
    // console.log(_params);
    create_event(_params);
});
