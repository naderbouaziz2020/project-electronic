$(function () {
  'use strict';

  var winH = $(window).height(),
      upperH = $('.upper-bar').innerHeight(),
      navH = $('.search-bar').innerHeight(),
      proH = $('.product-bar').innerHeight();

  $('.slider, .carousel-item').height(winH - ( upperH + navH + proH ));
});

// show password

function myFunction(){
  var x = document.getElementById("myInput");

  if (x.type === "password") {
    x.type = "text";
  }else {
    x.type = "password";
  }
}
