document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".reviewStarsBox img");
    let selectedIndex = -1; // Initially no star is selected

    stars.forEach((star, index) => {
        star.addEventListener("mouseenter", function () {
            fillStars(index);
        });

        star.addEventListener("mouseleave", function () {
            if (selectedIndex === -1) {
                resetStars();
            } else {
                fillStars(selectedIndex);
            }
        });

        star.addEventListener("click", function () {
            if (selectedIndex === index) {
                selectedIndex = -1; // Deselect the star if already selected
            } else {
                selectedIndex = index;
            }
            fillStars(selectedIndex);
            setRatingValue(selectedIndex + 1); // Set the hidden input value to the selected rating
        });
    });

    function fillStars(index) {
        for (let i = 0; i < stars.length; i++) {
            if (i <= index) {
                stars[i].setAttribute(
                    "src",
                    "/assets/client/images/filled_star.svg"
                );
            } else {
                stars[i].setAttribute(
                    "src",
                    "/assets/client/images/blank_star.svg"
                );
            }
        }
    }

    function resetStars() {
        stars.forEach((star) => {
            star.setAttribute("src", "/assets/client/images/blank_star.svg");
        });
    }

    function setRatingValue(value) {
        const ratingInput = document.getElementById("ratingValue");
        ratingInput.value = value;
    }
});
