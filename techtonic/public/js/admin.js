function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

// $(function () {
//     var max_file_number = 3,
//         // Define your form id or class or just tag.
//         $form = $(".file-limit"),
//         // Define your upload field class or id or tag.
//         $file_upload = $("#pic_path", $form),
//         // Define your submit class or id or tag.
//         $button = $(".submit", $form);

//     // Disable submit button on page ready.
//     $button.prop("disabled", "disabled");

//     $file_upload.on("change", function () {
//         var number_of_images = $(this)[0].files.length;
//         if (number_of_images > max_file_number) {
//             alert(`You can upload maximum ${max_file_number} files.`);
//             $(this).val("");
//             $button.prop("disabled", "disabled");
//         } else {
//             $button.prop("disabled", false);
//         }
//     });
// });

$("#addRow").click(function () {
    var html = "";
    html += '<div id="inputFormRow">';
    html += '<div class="input-group mb-3">';
    html +=
        '<input type="text" name="spec[]" class="form-control m-input" placeholder="Spec" required>';
    html += '<div class="input-group-append">';
    html +=
        '<button id="removeRow" type="button" class="btn btn-danger"><img src="/img/dash-lg.svg"></button>';
    html += "</div>";
    html += "</div>";

    $("#newRow").append(html);
});

// remove row
$(document).on("click", "#removeRow", function () {
    $(this).closest("#inputFormRow").remove();
});
