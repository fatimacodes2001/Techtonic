$(function() {
    $('.row-scroll').slick({
        accessibility: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
    });
});

$(function() {
    var row = $('#categories .row');
    var scrollto = row.offset().left + row.width() / 5;
    row.scrollLeft(scrollto);
});


function getImagePreview(input) {
    console.log(input.target.files[0]);
    var image = URL.createObjectURL(input.target.files[0]);
    console.log(image);
    $('#old-img').attr('src', image);
    // if (input.files && input.files[0]) {
    //     var reader = new FileReader();

    //     reader.onload = function(e) {
    //         $('old-img').attr('src', e.target.result);
    //     }

    //     reader.readAsDataURL(input.files[0]);
    // }
}

function showPassword() {
    var x = document.getElementById("pwd");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showRepeatPassword() {
    var x = document.getElementById("pwd-rpt");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function openModal() {
    var x = document.getElementById("modal-container");
    x.classList.add("show");
}

function closeModal() {
    var x = document.getElementById("modal-container");
    x.classList.remove("show");
}