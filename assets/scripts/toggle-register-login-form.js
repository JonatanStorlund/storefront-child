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