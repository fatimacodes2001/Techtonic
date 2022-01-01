function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

$(function () {
    var max_file_number = 3,
        $form = $(".file-limit"),
        $file_upload = $("#pic_path", $form);

    $file_upload.on("change", function () {
        var number_of_images = $(this)[0].files.length;
        if (number_of_images > max_file_number) {
            $("#error-display").removeClass("d-none");
            $("#error").text(
                `You can upload maximum ${max_file_number} files.`
            );
            $(this).val("");
        } else {
            $("#error-display").addClass("d-none");
        }
    });
});

$("#addRow").click(function () {
    var html = "";
    html += '<div id="inputFormRow">';
    html += '<div class="input-group mb-2">';
    html +=
        '<input type="text" name="spec[]" class="form-control m-input" placeholder="Spec" required>';
    html += '<div class="input-group-append">';
    html +=
        '<button id="removeRow" type="button" class="btn btn-danger"><img src="/img/dash-lg.svg"></button>';
    html += "</div>";
    html += "</div>";

    $("#newRow").append(html);
});

$(document).on("click", "#removeRow", function () {
    $(this).closest("#inputFormRow").remove();
});

var color = document.getElementById("color");
color.addEventListener(
    "input",
    function () {
        var colorHex = color.value;
        var n_match = ntc.name(colorHex);
        colorName = n_match[1];
        document.getElementById("color-name").value = colorName;
    },
    false
);

