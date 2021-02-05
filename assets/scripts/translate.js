jQuery(document).ready(function ($) {
  $("[lang='sv-SE'] button#place_order").html('Slutför köp');
  $("[lang='fi'] button#place_order").html('Osta');
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

  $('body').on('updated_checkout', function () {
    $('[lang="fi"] .shipping-pickup-store th strong').text("Valitse noutopaikka");
    $('[lang="sv-SE"] .shipping-pickup-store th strong').text("Välj hämtningsplats");
    $("[lang='sv-SE'] button#place_order").html('Slutför köp');
    $("[lang='fi'] button#place_order").html('Osta');
    $("[lang='sv-SE'] .woocommerce-shipping-totals th").html('Välj leverans eller hämtar');
    $("[lang='fi'] .woocommerce-shipping-totals th").html('Valitse toimitus tai nouto ');
    $("[lang='sv-SE'] .woocommerce-privacy-policy-text").html("<div class='woocommerce-privacy-policy-text'><p>Dina personuppgifter kommer att användas för att behandla din beställning, stödja din upplevelse på hela denna webbplats och för andra ändamål som beskrivs i vår <a href=" + document.location.origin + "/integritetspolicy>integritetspolicy</a></p></div>");
    $("[lang='fi'] .woocommerce-privacy-policy-text").html("<div class='woocommerce-privacy-policy-text'><p>Henkilötietojasi käytetään tilauksesi käsittelyyn, kokemuksen tukemiseen tällä verkkosivustolla ja muihin tarkoituksiin, jotka on kuvattu integritets-ohjelmassa. <a href=" + document.location.origin + "/tietosuojaseloste >tietosuojaseloste </a></p></div>");
  });
})
