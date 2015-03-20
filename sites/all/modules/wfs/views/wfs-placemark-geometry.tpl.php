<?php
// $Id: wfs-placemark-geometry.tpl.php,v 1.1.2.2 2010/05/05 19:26:29 tmcw Exp $
/**
 * @file part of the response to a GetFeature call
 * @global $gml
 * @global $attr
 * @global $feature_type
 * @global $feature_id
 */
?>
<gml:featureMember>
  <drupal:<?php echo $feature_type; ?> fid="<?php echo $feature_id; ?>">
    <drupal:geometry>
      <?php echo $gml; ?>
      </drupal:geometry>
    <?php foreach($attr as $k => $v): ?>
      <drupal:<?php echo $k ?>><![CDATA[<?php echo $v; ?>]]></drupal:<?php echo $k ?>>
    <?php endforeach; ?>
 </drupal:<?php echo $feature_type; ?>>
</gml:featureMember>
