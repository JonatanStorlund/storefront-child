<?php
add_action('init', function() {
	pll_register_string(  'sijomealprep',  'Till menyn', 'sijomealprep');
	pll_register_string(  'sijomealprep',  '<p>Gratis frakt om du köper för ', 'sijomealprep');
	pll_register_string(  'sijomealprep',  ' mer!</p>', 'sijomealprep');
	pll_register_string( 'sijomealprep-postcode-checker', 'postkod checker title', 'sijomealprep-postcode-checker');
	pll_register_string( 'sijomealprep-postcode-checker', 'postkod check button', 'sijomealprep-postcode-checker');
	pll_register_string( 'sijomealprep-postcode-checker', 'we can offer homedelivery', 'sijomealprep-postcode-checker');
	pll_register_string( 'sijomealprep-postcode-checker', 'sorry but you can pickup', 'sijomealprep-postcode-checker');
	pll_register_string( 'sijomealprep-postcode-checker', 'try again', 'sijomealprep-postcode-checker');
	pll_register_string('sijomealprep', 'Milkfree', 'sijomealprep');
	pll_register_string('sijomealprep', 'Glutenfree', 'sijomealprep');
	pll_register_string('sijomealprep', 'Eggfree', 'sijomealprep');
	pll_register_string('sijomealprep', 'Vegan', 'sijomealprep');
	pll_register_string('sijomealprep', 'Available', 'sijomealprep');
	pll_register_string('sijomealprep', 'Sold Out', 'sijomealprep');
	pll_register_string('sijomealprep', 'Select options', 'woocommerce');
	pll_register_string('sijomealprep', 'More Details', 'woocommerce');
});