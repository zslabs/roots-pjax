<?php
/**
 * Roots PJAX
 * WordPress meets HTML5 Boilerplate, Bootstrap, and PJAX
 * https://github.com/wayoutmind/roots-pjax
 */

require('route.php');

/* Begin custom functionality */
/* End custom functionality */

/* Load Roots PJAX */
add_action('get_header', 'RootsPJAX::load');
add_filter('get_header', 'RootsPJAX::render');
?>