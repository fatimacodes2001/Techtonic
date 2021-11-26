$(document).ready(function () {
  $('.row-scroll').slick({
    accessibility: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
  });
});

// $(document).ready(function () {
//   if (window.innerWidth < 768) {
//     console.log('Hello');
//     $('.row div').removeClass('col-4');
//   }
// });

// $(window)
//   .on('resize', function () {
//     var size = $(window).width(); //get updated width when window is resized
//     $('.row div').toggleClass('col-4', size > 768); //remove class only in less or equal to 1067
//   })
//   .resize(); //trigger resize on load

// $(document).ready(function () {
//   var outerContent = $('.row-scroll');
//   var innerContent = $('.row-scroll > div');

//   outerContent.scrollLeft((innerContent.width() - outerContent.width()) / 2);
// });
