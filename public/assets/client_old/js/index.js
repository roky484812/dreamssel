$(document).ready(function(){
  $(".quoteCarousel").owlCarousel({
    loop:true,
    responsiveClass:true,
    nav: true, // Enable navigation buttons
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"], // Custom navigation icons if needed
    dots: false,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:2
      },
      1000:{
        items:3
      }
    }
  });

  $(".PopulerProducts").owlCarousel({
    loop:true,
    responsiveClass:true,
    nav: false,
    dots: true,
    autoplay: true, 
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsive:{
      0:{
        items:2
      },
      520:{
        items:3
      },
      1000:{
        items:4
      },
      1400:{
        items:5
      },
      1700:{
        items:6
      }
    }
  });

  // top carousel

  $(".topCarousel").owlCarousel({
    items: 1,
    loop: true,
    responsiveClass: true,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
  });

});




function toggleSideMenuBar() {
  var sideMenuBar = document.querySelector('.sideBar');
  // sideMenuBar.style.display = (sideMenuBar.style.display === 'none' || sideMenuBar.style.display === '') ? 'block' : 'none';

  if (sideMenuBar.classList.contains('active')) {
    sideMenuBar.classList.remove('active');
  } else {
    sideMenuBar.classList.add('active');
  }
}

//search filter showing 

// search box category dropdown start here
document.addEventListener('DOMContentLoaded', function () {
  const DropDownBtns = document.querySelectorAll('.catagoryBtnSearchBar');
  const searchBoxDropdowns = document.querySelectorAll('.searchBoxDropdown');
  const dropDownIcons = document.querySelectorAll('.dropDownIcon');

  DropDownBtns.forEach(function (btn, index) {
    btn.addEventListener('click', function (event) {
      searchBoxDropdowns[index].classList.toggle('active');
      dropDownIcons[index].classList.toggle('angleUp');
      event.stopPropagation();
    });
  });

  document.addEventListener('click', function (event) {
    DropDownBtns.forEach(function (btn, index) {
      const target = event.target;
      const isClickInside = btn.contains(target) || searchBoxDropdowns[index].contains(target);
      if (!isClickInside) {
        searchBoxDropdowns[index].classList.remove('active');
        dropDownIcons[index].classList.remove('angleUp');
      }
    });
  });
});
// end here

// for category menu
document.addEventListener('DOMContentLoaded', function () {
  const subCategoryItems = document.querySelectorAll('.subCategoryItem');

  subCategoryItems.forEach(function(item) {
    item.addEventListener('click', function (event) {
      const subCategoryMenu = item.querySelector('.subCategoryMenu');
      const dropDownIcon = item.querySelector('.dropDownIcon');
      subCategoryMenu.classList.toggle('active');
      dropDownIcon.classList.toggle('angleDown');
      event.stopPropagation();
    });
  });
});