// $Id: wfs_behavior_virtualclick.js,v 1.1.2.3 2010/05/07 20:18:07 tmcw Exp $

/**
 * @file
 * JS Implementation of OpenLayers behavior.
 */

/**
 * VirtualClick Behavior
 */
Drupal.behaviors.wfs_behavior_virtualclick = function(context) {
  var data = $(context).data('openlayers');
  if (data && data.map.behaviors['wfs_behavior_virtualclick']) {

    layer = data.openlayers.getLayersBy('drupalID', 
      data.map.behaviors['wfs_behavior_virtualclick'].virtuallayer)[0];
      
    // Add control
    var control = new OpenLayers.Control.VirtualClick(layer, data.openlayers, {});

    control.clickedFeature = function(feature, evt) {
      url = feature.attributes[
        data.map.behaviors['wfs_behavior_virtualclick'].linkattribute];

      if(data.map.behaviors['wfs_behavior_virtualclick'].linkattribute) {
        url = $(url).attr('href');
      }

      window.location = url;
    }
    // TODO: attach to the correct layer
    data.openlayers.addControl(control);
    control.activate();
  }
}
