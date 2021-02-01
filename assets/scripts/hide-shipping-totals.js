jQuery(document).ready(function ($) {
  $('#order_review .woocommerce-shipping-totals').html($('#shipping_method_0').find(":selected").text());
  $('body').on('updated_checkout', function () {
    $('#order_review .woocommerce-shipping-totals').html($('#shipping_method_0').find(":selected").text());
  });
})