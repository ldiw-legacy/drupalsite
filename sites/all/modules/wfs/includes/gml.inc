<?php
// $Id: gml.inc,v 1.1.2.4 2010/05/19 14:29:42 tmcw Exp $

/**
 * @file WKT to GML converter
 * Adapted from OpenLayers
 */

//TODO: namespace or encapsulate into a class

define('NS_GML', 'http://www.opengis.net/gml');

/**
 * @param $wkt string of WKT data
 * @return $geometry array of parsed geometry
 *
 * This function is not intended to be tested: 
 * it is parsing geometries into an internal format.
 */
function parse_wkt($wkt) {
  $type_string = '/^\s*(\w+)\s*\(\s*(.*)\s*\)\s*$/';
  $paren_comma = '/\)\s*,\s*\(/';
  $trim_parens = '/^\s*\(?(.*?)\)?\s*$/';

  $geometry = array();
  if (preg_match($type_string, $wkt, $matches)) {
    $type = strtolower($matches[1]);

    if ($type == 'polygon') {
      $content = $matches[2];
      $rings = preg_split($paren_comma, $content);
      $rings = preg_replace($trim_parens, '$1', $rings);

      foreach ($rings as $ring) {
        $r = array();
        $points = explode(',', $ring);

        foreach ($points as $point) {
          $r[] = $point;
        }
        $geometry[] = $r;
      }
    }
  }

  return $geometry;
}

/**
 * @param $geometry array of parsed geometry
 * @return $gml string of GML XML
 */
function geometry_to_gml($geometry) {
  $doc = new SimpleXMLElement(
    "<gml:polygon xmlns:gml='http://www.opengis.net/gml'></gml:polygon>");
  $gml = $doc->addChild('Polygon', '', NS_GML);
  $outer = TRUE;

  foreach ($geometry as $ring) {
    if ($outer) {
      $boundary = $gml->addChild('exterior', '', NS_GML);
      $outer = FALSE;
    } else {
      $boundary = $gml->addChild('interior', '', NS_GML);
    }

    $linear_ring = $boundary->addChild('gml:LinearRing', '', NS_GML);
    $pos = $linear_ring->addChild('gml:posList', implode(' ', $ring), NS_GML);
    $pos->addAttribute('decimal', '.');
  }

  // this workaround required by the fact that 
  // ->asXML() on root elements will produce XML opening and 
  // closing tags
  return $doc->children(NS_GML)->asXML();
}

/**
 * Convert WKT to GML
 * @param $wkt a string of wkt
 * @return $gml a string of gml (or FALSE if no features)
 *
 * This is a convenience function for converting wkt to gml
 */
function wkt_to_gml($wkt) {
  $geometry = parse_wkt($wkt);
  return empty($geometry) ? FALSE : geometry_to_gml($geometry);
}
