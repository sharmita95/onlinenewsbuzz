$(document).ready(function() {
  makeCardImageClickable(".c-card .img-fill img");
  initSlickCarousel(".SlickCarousel");
  initScrollToTop("#return-to-top");
  initSearchPanleActions("#open-search", "#close-search");
});

function makeCardImageClickable(selector) {
  if (!$(selector).length) return;

  $(selector).click(function() {
    window.location = $(this)
      .closest(".c-card")
      .find(".title a")
      .attr("href");
  });
}

function initSlickCarousel(selector) {
  if (!$(selector).length) return;

  $(selector).slick({
    rtl: false, // If RTL Make it true & .slick-slide{float:right;}
    autoplay: true,
    autoplaySpeed: 5000, //  Slide Delay
    speed: 800, // Transition Speed
    slidesToShow: 4, // Number Of Carousel
    slidesToScroll: 1, // Slide To Move
    pauseOnHover: false,
    appendArrows: $(".Container .Head .Arrows"), // Class For Arrows Buttons
    prevArrow: '<span class="Slick-Prev"></span>',
    nextArrow: '<span class="Slick-Next"></span>',
    easing: "linear",
    responsive: [
      {
        breakpoint: 801,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 641,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 481,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
}

function initScrollToTop(selector) {
  if (!$(selector).length) return;
  
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      // If page is scrolled more than 50px
      $(selector)
        .fadeIn(200)
        .css({ display: "flex" }); // Fade in the arrow
    } else {
      $(selector).fadeOut(200); // Else fade out the arrow
    }
  });

  $(selector).click(function() {
    // When arrow is clicked
    $("body,html").animate(
      {
        scrollTop: 0 // Scroll to top of body
      },
      500
    );
  });
}

function initSearchPanleActions(openButton, closeButton) {
  $(closeButton).click(function() {
    $(".search-form").hide();
  });

  $(openButton).click(function() {
    $(".search-form").fadeIn();
  });
}
