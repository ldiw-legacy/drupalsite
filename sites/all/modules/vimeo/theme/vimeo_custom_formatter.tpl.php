<?php
// $Id: vimeo_custom_formatter.tpl.php,v 1.1.2.2 2010/02/20 11:10:32 starnox Exp $

/**
 * @file
 * Template for a Vimeo custom formatter.
 *
 * Please note: Vimeo video variables are cached and may not
 * reflect the actual data present on Vimeo.com
 *
 * Player variables:
 * - $player['width']
 * - $player['height']
 * - $player['title']
 * - $player['byline']
 * - $player['portrait']
 * - $player['color']
 * - $player['fullscreen']
 * - $player['autoplay']
 *
 * Node variables:
 * - $node[$variable]
 *
 * Video variables:
 * - $video['id']
 * - $video['title']
 * - $video['description']
 * - $video['url']
 * - $video['upload_date']
 * - $video['thumbnail_small']
 * - $video['thumbnail_medium']
 * - $video['thumbnail_large']
 * - $video['thumbnail_local']  - The large thumbnail stored locally
 * - $video['user_name']
 * - $video['user_portrait_small']
 * - $video['user_portrait_medium']
 * - $video['user_portrait_large']
 * - $video['user_portrait_huge']
 * - $video['stats_number_of_likes']
 * - $video['stats_number_of_plays']
 * - $video['stats_number_of_comments']
 * - $video['duration']
 * - $video['width']
 * - $video['height']
 * - $video['tags']
 */
 
 $url = 'http://vimeo.com/moogaloop.swf?clip_id='. $video['id'] .'&amp;server=vimeo.com&amp;show_title='. $player['title'] .'&amp;show_byline='. $player['byline'] .'&amp;show_portrait='. $player['portrait'] .'&amp;color='. $player['color'] .'&amp;fullscreen='. $player['fullscreen'] .'&amp;autoplay='. $player['autoplay'];
?>

<strong><?php print $video['title']; ?></strong><br />
<object width="<?php print $player['width']; ?>" height="<?php print $player['height']; ?>" class="vimeo-video">
  <param name="allowfullscreen" value="true" />
  <param name="allowscriptaccess" value="always" />
  <param name="movie" value="<?php print $url; ?>" />
  <embed src="<?php print $url; ?>" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="<?php print $player['width']; ?>" height="<?php print $player['height']; ?>"></embed>
</object>