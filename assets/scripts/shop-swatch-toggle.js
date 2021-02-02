jQuery(document).ready(function ($) {
  $('.products .large-cal').hide();
  $('.products .large-protein').hide();
  $(".variations_form").on("woocommerce_variation_select_change", function () {
    let large_selected = $(this).find('.swatch-large').hasClass('selected')
    if (large_selected) {
      $(this).parent().find('.small-cal').hide();
      $(this).parent().find('.small-protein').hide();
      $(this).parent().find('.large-cal').show();
      $(this).parent().find('.large-protein').show();
    } else {
      $(this).parent().find('.small-cal').show();
      $(this).parent().find('.small-protein').show();
      $(this).parent().find('.large-cal').hide();
      $(this).parent().find('.large-protein').hide();
    }
  });
});