$(document).ready(function(){
    $(".productViewCarousel").owlCarousel({
      loop:true,
      responsiveClass:true,
      nav: true, // Enable navigation buttons
      navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"], // Custom navigation icons if needed
      dots: false,
      responsive:{
        0:{
          items:3
        },
        400:{
          items:4
        },
        600:{
          items:6
        },
        800:{
          items:4
        },
        1000:{
          items:5
        },
        1200:{
          items:6
        }
      }
    });
  });
    