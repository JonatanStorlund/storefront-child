jQuery(document).ready(function ($) {
  $('.single-product .large-cal').hide();
  $('.single-product .large-protein').hide();

  $('.single-product .swatch-normal').click(function () {
    $('.single-product .small-cal').show();
    $('.single-product .small-protein').show();
    $('.single-product .large-cal').hide();
    $('.single-product .large-protein').hide();
  });

  $('.single-product .swatch-large').click(function () {
    $('.single-product .small-cal').hide();
    $('.single-product .small-protein').hide();
    $('.single-product .large-cal').show();
    $('.single-product .large-protein').show();
  });
});
