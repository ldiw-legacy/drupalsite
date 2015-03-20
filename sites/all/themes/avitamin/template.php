<?php // $Id: template.php,v 1.1.2.3 2010/06/21 19:08:59 finex Exp $  ?>
<?php

// Uncomment the following and rebuild the theme registry if you want to disable
// the "reply" link on each comment
//
// function phptemplate_links($links, $attributes = array('class' => 'links')) {
//   unset($links['comment_reply']);
//   return theme_links($links, $attributes);
// }

function avitamin_preprocess_page(&$vars) {
  $vars['ie6_style_hack'] = avitamin_ie6_style_hack();
  $vars['ie6'] = FALSE;
  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') !== false)){ $vars['ie6'] = TRUE; }
  $vars['footer_message'] = $vars['footer_message'] . " <span id=\"credits\"><a title=\"Themes Drupal.org\" href=\"http://www.themes-drupal.org\">T</a><a title=\"FiNeX Drupal Developer\" href=\"http://www.finex.org\">F</a><a title=\"In Erboristeria\" href=\"http://www.inerboristeria.com\">E</a></span>";
}

function avitamin_ie6_style_hack() {
  return ".views_slideshow_slide{height:300px!important;overflow:hidden;}";
}