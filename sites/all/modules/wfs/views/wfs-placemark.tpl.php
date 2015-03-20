<?php
// $Id: wfs-placemark.tpl.php,v 1.5.2.5 2010/05/05 19:26:29 tmcw Exp $
/**
 * @file part of the response to a GetFeature call
 *
 * This version accepts geometry, not points
 *
 * @global $geometry
 * @global $attr
 * @global $feature_type
 * @global $feature_id
 */
?>
<gml:featureMember>
  <drupal:<?php echo $feature_type; ?> fid="<?php echo $feature_id; ?>">
    <drupal:geometry>
      <gml:Point srsName="http://www.opengis.net/gml/srs/epsg.xml#4326">
        <gml:pos><?php echo $coords; ?></gml:pos>
      </gml:Point>
    </drupal:geometry>
    <?php foreach($attr as $k => $v): ?>
      <drupal:<?php echo $k ?>><![CDATA[<?php echo $v; ?>]]></drupal:<?php echo $k ?>>
    <?php endforeach; ?>
 </drupal:<?php echo $feature_type; ?>>
</gml:featureMember>
