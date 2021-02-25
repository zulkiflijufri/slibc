// get list artikel
let list_artikel = () => {
    $.ajax({
        // headers: {'x-api-key': token},
        url: 'http://localhost:8000/api/show_article',
        method: 'GET',
        dataType: 'json',
        success: function(data){
            // console.log(data);
            // loop data
            $.each(data.data, function (k, v) {
                $("#list_category").append(
                    "<tr>" +
                        '<th scope="row">' +
                        '<div class="media align-items-center">' +
                        '<a href="#" class="avatar rounded-circle mr-3">' +
                        '<img alt="Image placeholder" src="' +
                        v.image +
                        '">' +
                        "</a>" +
                        "</div>" +
                        "</th>" +
                        '<td class="title">' +
                        v.author +
                        "</td>" +
                        '<td class="title">' +
                        v.title +
                        "</td>" +
                        '<td class="category">' +
                        v.category_name +
                        "</td>" +
                        '<td class="content">' +
                        v.body +
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

list_artikel();

// delete data
let delete_artikel = (id) => {
    var r = confirm("Are you sure ?");
    if (r !== true) return;

    $.ajax({
        url: 'http://localhost:8000/api/delete_artikel',
        method: 'POST',
        data: {id:id},
        success: function(data){
            if (data.meta.code == '200_002') {
                location.reload()
            } else {
                alert("gagal hapus data");
            }
        },
    });
};

$("#table-category tbody").on("click", "#delete", function () {
    var idX = $(this).data("id");
    delete_artikel(idX);
});

// update function
$("#table-category tbody").on("click", "#edit", function () {
    localStorage.setItem("id_artikel", $(this).data("id"));
    window.location.href = "/admin/articles/edit";
});
