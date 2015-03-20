// $Id: wfs_behavior_virtualhover.js,v 1.1.2.7 2010/05/03 22:14:37 tmcw Exp $

/**
 * @file
 * JS Implementation of OpenLayers behavior.
 */

/**
 * VirtualHover Behavior
 */
Drupal.behaviors.wfs_behavior_virtualhover = function(context) {
  var data = $(context).data('openlayers');
  if (data && data.map.behaviors['wfs_behavior_virtualhover']) {
    layer = data.openlayers.getLayersBy('drupalID', 
      data.map.behaviors['wfs_behavior_virtualhover'].virtuallayer)[0];
  
    var control = new OpenLayers.Control.VirtualHover(layer, data.openlayers, {
      featureSize: 5
    });

    control.hoverOver = function() {
      $(this.layer.map.div).css('cursor',  'pointer');
    }
    control.hoverOut = function() {
      $(this.layer.map.div).css('cursor',  '');
    }

    data.openlayers.addControl(control);
    control.activate();
  }
}
