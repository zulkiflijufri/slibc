// set variable
var idX = localStorage.getItem("id_artikel");
var imageX;

// category selected
let selected_category = () => {
    $.ajax({
        url: "http://localhost:8000/api/category/list_category",
        method: "GET",
        dataType: "json",
        success: function (data) {
            // loop data
            $.each(data.data, function (k, v) {
                $("#category").append(
                    '<option value="' + v.id + '">' + v.name + "</option>"
                );
            });
        },
    });
};
selected_category();

// fetxh artikel
let fetch_data = (idX) => {
    $.ajax({
        url: "http://localhost:8000/api/fetch_artikel",
        method: "POST",
        data: { id: idX },
        success: function (data) {
            var dataX = data.data[0];
            $("#author").val(dataX.author);
            $("#title").val(dataX.title);
            $("#category").val(dataX.category_id).change();
            $("#body").val(dataX.body);
        },
    });
};
fetch_data(idX);

// function update
let update_artikel = (data) => {
    $.ajax({
        url: "http://localhost:8000/api/update_artikel",
        method: "POST",
        data: data,
        success: function (data) {
            if (data.meta.code == "200_002") {
                window.location.href = "/admin/articles";
            } else {
                alert(data.meta.message);
            }
        },
    });
};

$("#submit-update-article").on("click", function () {
    // validation
    if ($.trim($("#author").val()) == "") {
        alert("Author tidak boleh kosong");
        return;
    }
    if ($.trim($("#title").val()) == "") {
        alert("Title tidak boleh kosong");
        return;
    }
    if ($.trim($("#category").val()) == "") {
        alert("Category tidak boleh kosong");
        return;
    }
    if ($.trim($("#body").val()) == "") {
        alert("Body tidak boleh kosong");
        return;
    }

    var _data = {
        id: idX,
        title: $("#title").val(),
        category_id: $("#category").val(),
        body: $("#body").val(),
        author: $("#author").val(),
        image: imageX,
    };
    // console.log(_data);
    update_artikel(_data);
});

// bs 64
$("#customFile").on("change", async function () {
    var doc = document.getElementById("customFile").files;
    var pblc;
    var img;
    if (doc.length > 0) {
        var fileLoad = doc[0];

        // Check Size
        if(fileLoad.size > 1000000) { alert('*Ukuran gambar tidak boleh melebihi 1 MB'); return}
        // Set Doc Name on DOM
        // $`('#cstFileTxt').html('<cite>'+doc[0].name+'</cite>')

        var fileReader = new FileReader();

        fileReader.onload = function (fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result; // BS64 Output
            pblc = srcData;
            // console.log(pblc);
        };
        fileReader.readAsDataURL(fileLoad);

        setTimeout(() => {
            img = doc.length > 0 ? pblc : "";
            imageX = img;
            console.log(imageX);
        }, 300);
    }
});
