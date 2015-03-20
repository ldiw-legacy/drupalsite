// $Id: openlayers_virtual_vector.js,v 1.1.2.8 2010/05/03 22:14:37 tmcw Exp $

/**
 * @file
 * Layer handler for VirtualVector layers
 */

/**
 * Openlayer layer handler for VirtualVector layer
 */
Drupal.openlayers.layer.wfs_virtualvector = function(title, map, options) {
  // Create layer
  options_2 = {
    drupalID: options.drupalID,
    strategies: [new OpenLayers.Strategy.BBOX()],
    projection: "EPSG:4326",
    buffer: 0,
    protocol: new OpenLayers.Protocol.WFS({
        url: options.url,
        featurePrefix: 'drupal',
        featureType: options.typeName,
        geometryName: options.geometryName,
        formatOptions: {
          extractAttributes: true,
        },
        featureNS: 'http://drupal.org/project/wfs',
        srsName: 'EPSG:4326',
        version: '1.1.0'
      })
  };

  var layer = new OpenLayers.Layer.VirtualVector(title, options_2);
  return layer;
};
