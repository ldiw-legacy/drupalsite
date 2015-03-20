<?php
// $Id: views-view-wfs.tpl.php,v 1.3.2.3 2010/04/27 15:04:34 tmcw Exp $
/**
 * @file Response to feature query
 * @global $rows
 */
  print "<?xml"; ?> version="1.0" encoding="utf-8" <?php print "?>";
?>
<wfs:FeatureCollection
   xmlns:drupal="http://drupal.org/project/wfs"
   xmlns:wfs="http://www.opengis.net/wfs"
   xmlns:gml="http://www.opengis.net/gml"
   xmlns:ogc="http://www.opengis.net/ogc"
   xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
   xsi:schemaLocation="http://www.opengis.net/wfs http://schemas.opengeospatial.net//wfs/1.0.0/WFS-basic.xsd">
    <!-- <gml:featureMembers> -->
      <?php print $rows ?>
    <!-- </gml:featureMembers> -->
</wfs:FeatureCollection>
