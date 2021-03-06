<?php
/**
 * Roots PJAX
 * WordPress meets HTML5 Boilerplate, Bootstrap, and PJAX
 * https://github.com/wayoutmind/roots-pjax
 */

define('ROOTSPJAX_URL', get_bloginfo('stylesheet_directory'));

class RootsPJAX {
  public static function load() {
    wp_enqueue_script('pjax', ROOTSPJAX_URL . '/pjax/jquery.pjax.js', array('jquery'));
    wp_enqueue_script('roots-pjax', ROOTSPJAX_URL . '/rp.min.js', array('jquery', 'pjax'));
  }

  /**
   * PJAX templates
   */
  public static function render() {
    if (array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']) {

      // Load PJAX template conditionally based on post's template (as defined via Wordpress Administration)
      global $wp_query;
      $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );

      // Uses template
      if ($template_name == 'default') {
        require('templates/page.php');
        exit;
      } else if ($template_name != '') {
        require('templates/' . $template_name);
        exit;
      } else {
        if (is_single()) {
          require('templates/single.php');
          exit;
        } else if (is_archive()) {
          require('templates/archive.php');
          exit;
        } else if (is_search()) {
          require('templates/search.php');
          exit;
        } else if (is_home()) {
          if (is_front_page()) {
            require('templates/front-page.php');
            exit;
          } else {
            require('templates/index.php');
            exit;
          }
        }
      }
    }   
  }
}
?>