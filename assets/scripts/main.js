// hide show on scroll
jQuery(document).ready(function ($) {
  const $element = $('#masthead');

  let didScroll
  let lastScrollTop = 0
  const delta = 5
  const navbarHeight = $element.outerHeight()

  $(window).scroll(function () {
    didScroll = true
  })

  setInterval(function () {
    if (didScroll) {
      hasScrolled()
      didScroll = false
    }
  }, 250)

  function hasScrolled () {
    const st = $(window).scrollTop()

    // Make sure they scroll more than delta
    if (Math.abs(lastScrollTop - st) <= delta)
      return

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight) {
      // Scroll Down
      $element.addClass('nav-up')
      if (
        $element[0].closeMenu &&
        /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
      ) {
        $element[0].closeMenu()
      }

    } else {
      // Scroll Up
      if (st + $(window).height() < $(document).height()) {
        $element.removeClass('nav-up')
      }
    }

    lastScrollTop = st
  }
});

// shop swatch toggle
jQuery(document).ready(function ($) {
  $('.products .large-cal').hide();
  $('.products .large-protein').hide();
  $(".variations_form").on("woocommerce_variation_select_change", function () {
    let stor_selected = $(this).find('.swatch-stor').hasClass('selected')
    let iso_selected = $(this).find('.swatch-iso').hasClass('selected')
    let large_selected = $(this).find('.swatch-large').hasClass('selected')

    if (stor_selected || iso_selected || large_selected) {
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

// single swatch toggle
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

  $('.single-product .swatch-vanlig').click(function () {
    $('.single-product .small-cal').show();
    $('.single-product .small-protein').show();
    $('.single-product .large-cal').hide();
    $('.single-product .large-protein').hide();
  });

  $('.single-product .swatch-stor').click(function () {
    $('.single-product .small-cal').hide();
    $('.single-product .small-protein').hide();
    $('.single-product .large-cal').show();
    $('.single-product .large-protein').show();
  });

  $('.single-product .swatch-tavallinen').click(function () {
    $('.single-product .small-cal').show();
    $('.single-product .small-protein').show();
    $('.single-product .large-cal').hide();
    $('.single-product .large-protein').hide();
  });

  $('.single-product .swatch-iso').click(function () {
    $('.single-product .small-cal').hide();
    $('.single-product .small-protein').hide();
    $('.single-product .large-cal').show();
    $('.single-product .large-protein').show();
  });
});

// hide show register / login form 
jQuery(document).ready(function ($) {
  let $loginForm = $('.col2-set#customer_login .col-1')
  let $registerForm = $('.col2-set#customer_login .col-2')

  $('.no-account-wrapper .register-button').click(function () {
    $loginForm.toggle("slow")
    $registerForm.toggle("slow")
    $('.no-account-wrapper .has-account-title').show()
    $('.no-account-wrapper .no-account-title').hide()
    $('.no-account-wrapper .sign-in-button').show()
    $(this).hide()
  })

  $('.no-account-wrapper .sign-in-button').click(function () {
    $loginForm.toggle("slow")
    $registerForm.toggle("slow")
    $('.no-account-wrapper .no-account-title').show()
    $('.no-account-wrapper .has-account-title').hide()
    $('.no-account-wrapper .register-button').show()
    $(this).hide()
  })
});

// Translate strings with javascript

jQuery(document).ready(function ($) {
  $("[lang='sv-SE'] .wt-mycoupons h4").html('Tillgängliga rabattkoder');
  $("[lang='fi'] .wt-mycoupons h4").html('Saatavilla alevat alennuskoodit');
  $("[lang='sv-SE'] .woocommerce-MyAccount-navigation-link--wt-smart-coupon a").html('Mina rabattkoder');
  $("[lang='fi'] .woocommerce-MyAccount-navigation-link--wt-smart-coupon a").html('Minun alennuskoodit');
  $("[lang='sv-SE'] .woocommerce-billing-fields h3").html('Kontrollera din order, välj leverans- /hämtnings alternativ och fyll i dina uppgifter');
  $("[lang='fi'] .woocommerce-billing-fields h3").html('Tarkista tilaus, valitse toimitus- /nouto vaihtoehdoista ja täytä tietojasi');
  $("[lang='sv-SE'] button#place_order").html('Slutför köp');
  $("[lang='sv-SE'] .woocommerce-shipping-totals th").html('Välj leverans eller hämtar');
  $("[lang='fi'] .woocommerce-shipping-totals th").html('Valitse toimitus tai nouto ');
  $("[lang='sv-SE'] .woocommerce-privacy-policy-text").html("<div class='woocommerce-privacy-policy-text'><p>Dina personuppgifter kommer att användas för att behandla din beställning, stödja din upplevelse på hela denna webbplats och för andra ändamål som beskrivs i vår <a href=" + document.location.origin + "/integritetspolicy>integritetspolicy</a></p></div>");
  $("[lang='fi'] .woocommerce-privacy-policy-text").html("<div class='woocommerce-privacy-policy-text'><p>Henkilötietojasi käytetään tilauksesi käsittelyyn, kokemuksen tukemiseen tällä verkkosivustolla ja muihin tarkoituksiin, jotka on kuvattu integritets-ohjelmassa. <a href=" + document.location.origin + "/integritetspolicy>integritetspolicy</a></p></div>");
  $('[lang="sv-SE"] .swatch-large').text("Stor");
  $('[lang="fi"] .swatch-large').text("Iso");
  $('[lang="fi"] .swatch-normal').text("Tavallinen");
  $('[lang="fi"] .shipping-pickup-store th strong').text("Valitse noutopaikka");
  $('[lang="sv-SE"] .shipping-pickup-store th strong').text("Välj hämtningsplats");
  $('[lang="fi"] .woocommerce-cart .coupon label').text("Onko sinulla kuponki? Voit lisää sen tähän");
  $('[lang="sv-SE"] .woocommerce-cart .coupon label').text("Har du en rabattkod? Fyll i den här");
  $('[lang="fi"] .woocommerce-checkout .wpll-pickup-null').text("valitse noutopaikka");
  $('[lang="sv-SE"].woocommerce-checkout .wpll-pickup-null').text("välj en upphämtningsplats");

  $('body').on('updated_checkout', function () {
    $('[lang="fi"] .woocommerce-checkout .wpll-pickup-null').text("valitse noutopaikka");
    $('[lang="sv-SE"] .woocommerce-checkout .wpll-pickup-null').text("välj en upphämtningsplats");
    $('[lang="fi"] .shipping-pickup-store th strong').text("Valitse noutopaikka");
    $('[lang="sv-SE"] .shipping-pickup-store th strong').text("Välj hämtningsplats");
    $("[lang='sv-SE'] button#place_order").html('Slutför köp');
    $("[lang='sv-SE'] .woocommerce-shipping-totals th").html('Välj leverans eller hämtar');
    $("[lang='fi'] .woocommerce-shipping-totals th").html('Valitse toimitus tai nouto ');
    $("[lang='sv-SE'] .woocommerce-privacy-policy-text").html("<div class='woocommerce-privacy-policy-text'><p>Dina personuppgifter kommer att användas för att behandla din beställning, stödja din upplevelse på hela denna webbplats och för andra ändamål som beskrivs i vår <a href=" + document.location.origin + "/integritetspolicy>integritetspolicy</a></p></div>");
    $("[lang='fi'] .woocommerce-privacy-policy-text").html("<div class='woocommerce-privacy-policy-text'><p>Henkilötietojasi käytetään tilauksesi käsittelyyn, kokemuksen tukemiseen tällä verkkosivustolla ja muihin tarkoituksiin, jotka on kuvattu integritets-ohjelmassa. <a href=" + document.location.origin + "/tietosuojaseloste >tietosuojaseloste </a></p></div>");
  });
})
