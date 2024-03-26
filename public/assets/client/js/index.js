$(document).ready(function () {
    $(".topCarousel").owlCarousel({
        items: 1,
        loop: true,
        responsiveClass: true,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
    });

    $(".flashSaleCarousel").owlCarousel({
        loop: true,
        responsiveClass: true,
        nav: true,
        navText: [
            "<i class='fa-solid fa-arrow-left'></i>",
            "<i class='fa-solid fa-arrow-right'></i>",
        ],
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2,
            },
            767: {
                items: 3,
            },
            1400: {
                items: 4,
            },
        },
    });

    $(".categoryCarouselBox").owlCarousel({
        loop: true,
        responsiveClass: true,
        nav: true,
        navText: [
            "<i class='fa-solid fa-arrow-left'></i>",
            "<i class='fa-solid fa-arrow-right'></i>",
        ],
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2,
            },
            400: {
                items: 3,
            },
            768: {
                items: 4,
            },
            1000: {
                items: 5,
            },
            1200: {
                items: 6,
            },
        },
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const categoryDropDown = document.getElementById("categoryDropDown");
    const subCategoryItems = document.querySelectorAll(".subCategoryItem");

    categoryDropDown.addEventListener("click", function (event) {
        const categoryDropDownMenu = document.querySelector(
            "#drawerCategoryMenu"
        );
        const dropDownIcon = document.querySelector("#dropDownIcon");
        categoryDropDownMenu.classList.toggle("active");
        dropDownIcon.classList.toggle("angleDown");
        event.stopPropagation();
    });

    subCategoryItems.forEach(function (item) {
        item.addEventListener("click", function (event) {
            const subCategoryMenu = item.querySelector(".subCategoryMenu");
            const dropDownIcon = item.querySelector(".dropDownIcon");
            subCategoryMenu.classList.toggle("active");
            dropDownIcon.classList.toggle("angleDown");
            event.stopPropagation();
        });
    });
});

(function ($) {
    "use strict";

    // ______________ Page Loading
    $(window).on("load", function (e) {
        $("#global-loader").fadeOut("slow");
    });
})(jQuery);
