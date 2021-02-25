// set variable
var idX = localStorage.getItem("id_event");

let fetch_data = (idX) => {
    $.ajax({
        url: "http://localhost:8000/api/fetch_event",
        method: "POST",
        data: { id: idX },
        success: function (data) {
            var dataX = data.data[0];

            $("#event").val(dataX.agenda);
            $("#description").val(dataX.description);
            $("#date-start").val(dataX.start_date).change();
            $("#date-end").val(dataX.end_date).change();
            $("#location").val(dataX.location);
        },
    });
};
fetch_data(idX);

let update_event = (_data) => {
    $.ajax({
        url: "http://localhost:8000/api/update_event",
        method: "POST",
        data: _data,
        success: function (data) {
            if ((data.meta.code = "200_002")) {
                window.location.href = "/admin/events";
            } else {
                alert(data.meta.message);
            }
        },
    });
};

$("#edit-event").on("click", function () {
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

    var _data = {
        id: idX,
        agenda: $("#event").val(),
        start_date: $("#date-start").val(),
        end_date: $("#date-end").val(),
        location: $("#location").val(),
        description: $("#description").val(),
    };
    update_event(_data);
});
