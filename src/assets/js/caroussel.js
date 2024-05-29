// Binding of init has to be before intialization!
$(document).ready(function(){
$(".slick-slider").on("init", (event, slick, currentSlide) => {
    let slideIndex = slick.currentSlide;
    let slidesLength = slick.slideCount;
  });
  // Initialise.
  $(".slick-slider").slick({
    slidesToShow: 1,
    dots: true,
    autoplay: true,
    autoplaySpeed: 3000,
    //centerMode: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          arrows: false,
          //centerMode: true,
          centerPadding: '40px'
        }
      }
    ]
  });
  
  
});