// list data
let list_event = () => {
    $.ajax({
        url: "http://localhost:8000/api/show_event",

        method: "GET",
        success: function (data) {
            // loop datas
            $.each(data.data, function (k, v) {
                $("#list").append(
                    "<tr>" +
                        '<td class="event">' +
                        v.agenda +
                        "</td>" +
                        '<td class="description">' +
                        v.description +
                        "</td>" +
                        '<td class="date">' +
                        v.start_date +
                        "</td>" +
                        '<td class="date">' +
                        v.end_date +
                        "</td>" +
                        '<td class="location">' +
                        v.location +
                        "</td>" +
                        '<td class="text-right">' +
                        '<div class="dropdown">' +
                        '<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                        '<i class="fas fa-ellipsis-v"></i>' +
                        "</a>" +
                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">' +
                        '<a class="dropdown-item" id="edit" data-id="' +
                        v.id +
                        '" href="#">Edit</a>' +
                        '<a class="dropdown-item" id="delete" data-id="' +
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

list_event();

// link to update
$("#table-event tbody").on("click", "#edit", function () {
    localStorage.setItem("id_event", $(this).data("id"));
    window.location.href = "/admin/events/edit";
});

// delete function
$("#table-event tbody").on("click", "#delete", function () {
    $.ajax({
        url: "http://localhost:8000/api/delete_event",
        method: "POST",
        data: { id: $(this).data("id") },
        success: function (data) {
            if ((data.meta.code = "200_002")) {
                location.reload();
            } else {
                alert(data.meta.message);
            }
        },
    });
});
