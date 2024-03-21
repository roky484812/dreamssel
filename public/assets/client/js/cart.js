/* Set rates + misc */
var shippingRate = 60.0;
var fadeTime = 300;

/* Assign actions */
$('.product-quantity input').change(function () {
  updateQuantity(this);
});

$('.product-removal button').click(function () {
  removeItem(this);
});

/* Recalculate cart */
function recalculateCart() {
  var subtotal = 0;

  /* Sum up row totals */
  $('.product').each(function () {
    subtotal += parseFloat($(this).find('.product-line-price').text());
  });

  /* Calculate totals */
  var total = subtotal + shippingRate;

  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function () {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if (total == 0) {
      $('.checkout').fadeOut(fadeTime);
    } else {
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });
}

/* Update quantity */
function updateQuantity(quantityInput) {
  /* Calculate line price */
  var productRow = $(quantityInput).closest('.product');
  var price = parseFloat(productRow.find('.product-price').text());
  var quantity = parseInt($(quantityInput).val());
  var linePrice = price * quantity;

  /* Update line price display and recalc cart totals */
  productRow.find('.product-line-price').text(linePrice.toFixed(2));
  recalculateCart();
}

/* Remove item from cart */
function removeItem(removeButton) {
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function () {
    productRow.remove();
    recalculateCart();
  });
}

// Optional: Apply coupon code for discount
$('#apply-coupon').click(function () {
  // Add your coupon code logic here
  // Update cart total accordingly
  var discount = 10; // Example discount amount
  var total = parseFloat($('#cart-total').text());
  var discountedTotal = total - discount;
  $('#cart-total').text(discountedTotal.toFixed(2));
});

// Custom increase and decrease functionality for quantity inputs
$('.product-quantity .quantity-button').click(function () {
    // No code here to change input value
});
