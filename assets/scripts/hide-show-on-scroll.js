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
