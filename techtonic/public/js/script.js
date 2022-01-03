$(function() {
    $(".row-scroll").slick({
        accessibility: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
    });
});

$(function() {
    var row = $("#categories .row");
    var scrollto = row.offset().left + row.width() / 5;
    row.scrollLeft(scrollto);
});

$(function() {
    $(".rating-sec label").click(function() {
        $(".rating-sec label").removeClass("active");
        $(this).addClass("active");
    });
});


function getImagePreview(input) {
    console.log(input.target.files[0]);
    var image = URL.createObjectURL(input.target.files[0]);
    console.log(image);
    $('#old-img').attr('src', image);
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

function showOldPassword() {
    var x = document.getElementById("inputPassword1");
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

function edit() {
    $("#edit-details").hide()
    $("#inputEmail3").attr('disabled', false)
    $("#firstname").attr('disabled', false)
    $("#lastname").attr('disabled', false)
    $("#inputPassword1").attr('disabled', false)
    $("#pwd").attr('disabled', false)
    $("#pwd-rpt").attr('disabled', false)
    $("#save-details").attr('hidden', false)
    $("#view-profile").css({
        "pointer-events": "auto",
        "background-color": "black"
    })
}