<?php
/** 
 * Supply metadata
 */

// Start output_buffer
ob_start();

header('X-WordPress-Body-Class: ' . join(' ', get_body_class()));
header('X-WordPress-Link-Canonical: ' . get_permalink());

$previous_id = get_adjacent_post($in_same_cat = false, $excluded_categories = '', $previous = true)->ID;
$next_id = get_adjacent_post($in_same_cat = false, $excluded_categories = '', $previous = false)->ID;

if (!is_singular()) {
    header('X-WordPress-Link-Previous: ' . get_previous_posts_page_link());
    header('X-WordPress-Link-Next: ' . get_next_posts_page_link());
} else {
    header('X-WordPress-Link-Previous: ' . get_permalink($previous_id));
    header('X-WordPress-Link-Next: ' . get_permalink($next_id));
}

header('X-WordPress-Title-Previous: ' . get_the_title($previous_id));
header('X-WordPress-Title-Next: ' . get_the_title($next_id));

ob_end_clean();
// End output buffer

?>
<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>