$(function () {
    $(".row-scroll").slick({
        accessibility: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
    });
});

$(function () {
    var row = $("#categories .row");
    var scrollto = row.offset().left + row.width() / 5;
    row.scrollLeft(scrollto);
});

$(function () {
    $(".rating-sec label").click(function () {
        $(".rating-sec label").removeClass("active");
        $(this).addClass("active");
    });
});
