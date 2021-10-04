$(document).ready(function(){
  $(".tab_2_ipad").owlCarousel({
    items:1,
    responsive:{
      0:{
          items:1
      },
    },
    autoHeight:true,
    dots: false,
    autoplay: true,
	  autoplayTimeout: 5000,
	  autoplayHoverPause: true,
	  autoplaySpeed: 500,
    rewind: true
  }),
  $(".tab_2").owlCarousel({
    items:1,
    responsive:{
      0:{
          items:1
      },
    },
    autoHeight:true,
    dots: true,
    dotsEach: 1,
    dotsContainer: '#carousel-custom-dots',
    autoplay: true,
	  autoplayTimeout: 5000,
	  autoplayHoverPause: true,
	  autoplaySpeed: 500,
    rewind: true
  }),
    $(".tab_3").owlCarousel({
    items:4,
    responsive:{
      1024:{
          items:2.7
      },
    },
    dots: false,
    stagePadding: true,
    center: true,
    loop: true,
    startPosition: 0
  });
  $("#carousel").owlCarousel({
    items:1,
    responsive:{
      0:{
          items:1
      },
    },
    navigation : false,
    slideSpeed : 500,
     paginationSpeed : 800,
    rewindSpeed : 1000,
    singleItem: true,
    autoPlay : true,
    stopOnHover : true,
    center: true,
    loop: true,
});
  $("#carousel_ipad").owlCarousel({
    items:1,
    responsive:{
      0:{
          items:1
      },
    },
    navigation : false,
    slideSpeed : 500,
     paginationSpeed : 800,
    rewindSpeed : 1000,
    singleItem: true,
    autoPlay : true,
    stopOnHover : true,
    center: true,
    loop: true,
});
});