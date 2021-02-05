<?php

function hook_css() {
  if ( is_user_logged_in() ) {
  ?>
      <style>
          .is-logged-in {
              display: none !important;
          }
      </style>
  <?php
  } else {
      ?>
      <style>
          .is-logged-out {
              display: none !important;
          }
      </style>
  <?php
  }
}
add_action('wp_head', 'hook_css');

add_action( 'woocommerce_after_customer_login_form', function() {
  echo '<div class="no-account-wrapper">';
  echo '<h3 class="no-account-title">' . pll__('No account?', 'sijomealprep') . '</h3>';
  echo '<button class="button alt register-button">' . pll__('Register', 'sijomealprep') . '</button>';
  echo '<h3 class="has-account-title">' . pll__('Already have an account?', 'sijomealprep') . '</h3>';
  echo '<button class="button alt sign-in-button">' . pll__('Sign in', 'sijomealprep') . '</button>';
  echo '</div>';
} );
