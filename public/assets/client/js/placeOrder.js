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
    var subTotal = parseInt(document.getElementById("cart-subtotal").getAttribute("data-subtotal"));
    var cartTotal = document.getElementById("cart-total");

    // Set initial value of cartTotal to subTotal
    cartTotal.textContent = subTotal;

    // Add event listeners to radio buttons
    insideDhakaRadio.addEventListener("change", function () {
        if (insideDhakaRadio.checked) {
            shippingCost.textContent = "60";
            var total = subTotal + 60;
            cartTotal.textContent = total;
        }
    });

    outsideDhakaRadio.addEventListener("change", function () {
        if (outsideDhakaRadio.checked) {
            shippingCost.textContent = "120";
            var total = subTotal + 120;
            cartTotal.textContent = total;
        }
    });
});



