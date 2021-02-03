<?php
function render_postcode_checker( $atts ){
	ob_start();
	echo '<div id="postcode-checker" class="postcode-checker box-shadow">';
	echo '<h3 class="postcode-checker-title">'; echo pll__('postkod checker title', 'sijomealprep-postcode-checker');
	echo '</h3>';
	echo '<input class="postcode-checker-input" type="number">';
	echo '<button type="button" class="postcode-checker-button">'; echo pll__('postkod check button', 'sijomealprep-postcode-checker');
	echo '</button>';
	echo '<p class="postcode-checker-msg msg-we-deliver">'; echo pll__('we can offer homedelivery', 'sijomealprep-postcode-checker');
	echo '</p>';
	echo '<p class="postcode-checker-msg msg-we-dont">'; echo pll__('sorry but you can pickup', 'sijomealprep-postcode-checker');
	echo '</p>';
	echo '<p class="postcode-checker-msg msg-tryagain">'; echo pll__('try again', 'sijomealprep-postcode-checker');
	echo '</p>';
  echo '</div>';
	?>

	<script>
	jQuery(function($) {
		const $checkerWrapper = $('.postcode-checker');
		const $checkerInput = $('.postcode-checker-input');
		const $msgDeliver = $('.msg-we-deliver');
		const $msgDont = $('.msg-we-dont');
		const $msgTryagain = $('.msg-tryagain');
		const $checkerButton = $('.postcode-checker-button');

		$msgDeliver.hide();
		$msgDont.hide();
		$msgTryagain.hide();

		$checkerButton.mousedown(function(e) {
			e.preventDefault()
			const zipcodeIncluded = $checkerInput.val().match(/^(666|667|68|679|678|677|676|674|673|672|671|669|668|6659|6658|6656|6655|6654|6653|651|652|653|656|6571|6573)/);

			if ($checkerInput.val().length === 5 && typeof Number) {
				if (zipcodeIncluded) {
					$msgDeliver.show();
					$msgDont.hide();
					$msgTryagain.hide();
				} else {
					$msgDont.show();
					$msgDeliver.hide();
					$msgTryagain.hide();
				}
			} else {
				$msgTryagain.show();
				$msgDeliver.hide();
				$msgDont.hide();
				setTimeout(() => {
					$msgDeliver.hide();
					$msgDont.hide();
					$msgTryagain.hide();
				}, 2000);
			}
		})

		$checkerInput.keypress(function(event) {
				if (event.keyCode === 13) {
					event.preventDefault();
					$checkerButton.mousedown();
				}
		});
	});
	</script>
	<?php
	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}

add_shortcode( 'postcode_checker', 'render_postcode_checker' );

// function add_postcode_checker() {
//  	echo do_shortcode("[postcode_checker]");
// }