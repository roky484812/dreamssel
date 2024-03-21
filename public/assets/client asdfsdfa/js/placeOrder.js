// for order conformation form
document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("checkPhone")
        .addEventListener("change", function () {
            document.getElementById("phone").disabled = this.checked;
        });

    document
        .getElementById("checkEmail")
        .addEventListener("change", function () {
            document.getElementById("email").disabled = this.checked;
        });
});

document.addEventListener("DOMContentLoaded", function () {
    // Get radio buttons
    var insideDhakaRadio = document.getElementById("insideDhaka");
    var outsideDhakaRadio = document.getElementById("outsideDhaka");

    // Get shipping cost element
    var shippingCost = document.getElementById("cart-shipping");
    var subTotal = $(this).data("subtotal");
    var shippingCostInput = document.getElementById("shipping");
    var cartTotal = document.getElementById("cart-total");
    // Add event listeners to radio buttons
    insideDhakaRadio.addEventListener("change", function () {
        if (insideDhakaRadio.checked) {
            shippingCost.textContent = "60";
            // Parse shipping cost as an integer
            // Parse subtotal as an integer

            cartTotal.textContent = parseInt(subTotal) + 60;
        }
    });

    outsideDhakaRadio.addEventListener("change", function () {
        if (outsideDhakaRadio.checked) {
            shippingCost.textContent = "120";
            var shippingCost = parseInt(this.value); // Parse shipping cost as an integer
            // Parse subtotal as an integer

            cartTotal.textContent = subTotal + shippingCost;
        }
    });

    // Assuming shippingCost is an input field where users can enter shipping cost
});
