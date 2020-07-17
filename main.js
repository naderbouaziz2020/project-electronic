  $(function () {
  'use strict';

/*  var winH = $(window).height(),
      upperH = $('.upper-bar').innerHeight(),
      navH = $('.search-bar').innerHeight(),
      proH = $('.product-bar').innerHeight();

  $('.slider, .carousel-item').height(winH - ( upperH + navH + proH ));

*/
// Confirm message
$('.confirm').click(function (){

    return confirm('Are you sure?');
  });
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


// filter product


/*
$(document).ready(function(){

  $(".product_check").click(function(){
    $("#loader").show();

    var action = 'data';
    var brand = get_filter_text('brand');
    var etat = get_filter_text('etat');

    $.ajax({
      url:'action.php',
      method:'POST',
      data:{action:action,brand:brand,etat:etat},
      success:function(response){
        $("#result").html(response);
        $("#loader").hide();
      }
    });

  });

  function get_filter_text(text_id){
    var filterData = [];
    $('#'+text_id+':checked').each(function(){
      filterData.push($(this).val());
    });
    return filterData;
  }
});
*/


// not exactly vanilla as there is one lodash function

var allCheckboxes = document.querySelectorAll('input[type=checkbox]');
var allPlayers = Array.from(document.querySelectorAll('.player'));
var checked = {};

getChecked('startingReserves');
getChecked('injured');


Array.prototype.forEach.call(allCheckboxes, function (el) {
  el.addEventListener('change', toggleCheckbox);
});

function toggleCheckbox(e) {
  getChecked(e.target.name);
  setVisibility();
}

function getChecked(name) {
  checked[name] = Array.from(document.querySelectorAll('input[name=' + name + ']:checked')).map(function (el) {
    return el.value;
  });
}

function setVisibility() {
  allPlayers.map(function (el) {
    var startingReserves = checked.startingReserves.length ? _.intersection(Array.from(el.classList), checked.startingReserves).length : true;
    var injured = checked.injured.length ? _.intersection(Array.from(el.classList), checked.injured).length : true;

    if (startingReserves && injured) {
      el.style.display = 'block';
    } else {
      el.style.display = 'none';
    }
  });
}

// filter states

// vars
var filter_link = $('#filter'),
    gallery_item = $('.tumb'),
    gallery_img = $('.tumb > img');


filter_link.on('change',function(){
  // find same class of menu
  var filterVal = $(this).val();

  console.log (filterVal);

  if(filterVal == 'all') {
    // Each all and filter values
    gallery_item.each(function() {
        var self = $(this);
        self.removeClass('hidden-me-full');
        var wait  = setTimeout(function(){
           self.removeClass('hidden-me');
          clearTimeout(wait);
       },500);
    });
  }else{
    // Each all and filter values
    gallery_item.each(function() {
       var self = $(this);
      // Hide
      if(!self.hasClass(filterVal)) {
        self.addClass('hidden-me');
        var wait  = setTimeout(function(){
          console.log('and now');
           self.addClass('hidden-me-full');
          clearTimeout(wait);
        },500);
      }else{
        self.removeClass('hidden-me-full');
        var wait  = setTimeout(function(){
           self.removeClass('hidden-me');
          clearTimeout(wait);
       },500);
      }
    });
  }
  return false;
});



// simply preloader
gallery_img.each(function() {
  $(this).css({opacity: 0}).load(function() {
    $(this).animate({opacity: 1}, 1000);
  }).attr('src', $(this).data('src'))
  // wait and remove data-src
  .delay(100)
  .attr('data-src','');
});


// simply preloader
gallery_item.each(function() {

  $(this).on('click',function(e){
    e.preventDefault();
    $('.thumbnails-preview').addClass('show-thumbnail');
    $('body').css('overflow','hidden');
    $('.thumbnail-title').append(
      $(this).find('img').attr('alt')
    );
    $('.thumbnail-content').append(
      '<img src="'+$(this).find('img').attr('src')+'">'
      );
  })


  $('.thumbnail-close').on('click',function(e){
    e.preventDefault();
    $('body').css('overflow','');
    $('.thumbnails-preview').removeClass('show-thumbnail');
    $('.thumbnail-title').html('');
    $('.thumbnail-content').html('');
  });
});


// show filters


function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
