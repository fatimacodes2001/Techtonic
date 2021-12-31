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



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('old-img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#select-file").on('change', function() {
    console.log('helo');
    readURL(this);
});

$("#sign-in-form").on('change', function() {
    console.log('helo');
    readURL(this);
});


$("#select-img-label").on('change', function() {
    console.log('helo');
    readURL(this);
});