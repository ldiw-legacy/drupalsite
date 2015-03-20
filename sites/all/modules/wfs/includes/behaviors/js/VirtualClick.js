/* Copyright (c) 2006-2008 MetaCarta, Inc., published under the Clear BSD
 * license.  See http://svn.openlayers.org/trunk/openlayers/license.txt for the
 * full text of the license. */


/**
 * @requires OpenLayers/Control.js
 * @requires OpenLayers/Handler/Hover.js
 */

/**
 * Class: OpenLayers.Control.VirtualClick
 * <OpenLayers.Layer.VirtualClick> constructor.
 *
 * Inherits from:
 *  - <OpenLayers.Layer>
 */
OpenLayers.Control.VirtualClick = OpenLayers.Class(OpenLayers.Control, { 
    /**
     * TODO: eliminate this constant
     */
    featureSize: 10,

    extent_cache: null,

    resolution_cache: null,



    defaultHandlerOptions: {
        'delay': 50,
        'pixelTolerance': null,
        'stopMove': false
    },

    initialize: function(layer, map, options) {
        this.layer = layer;
        this.map = map;
        this.handlerOptions = OpenLayers.Util.extend(
            {}, this.defaultHandlerOptions
        );
        OpenLayers.Control.prototype.initialize.apply(
            this, arguments
        );
        this.handler = new OpenLayers.Handler.Click(
            this,
            {'click': this.onClick, 'move': this.onMove},
            this.handlerOptions
        );
        this.layer.events.register('moveend', this, this.flushCache);
    },

    fastGetPx: function(lonlat) {
        var px = null; 
        if (lonlat != null) {
            this.resolution_cache = (this.resolution_cache !== null) ? 
              this.resolution_cache : this.map.getResolution();
            this.extent_cache = (this.extent_cache !== null) ? 
              this.extent_cache : this.map.getExtent();
            px = {
              'x': (1/this.resolution_cache * 
                (lonlat.lon - this.extent_cache.left)),
              'y': (1/this.resolution_cache * 
                (this.extent_cache.top - lonlat.lat))
            };    
        }
        return px;
    },

    /**
     * When the mouse pointer hovers briefly over the map,
     * determine whether it is hovering over the map by checking the basic
     * box it's over, and whether there are points within it.
     *
     * Since calls to getPixelFromLonLat are expensive, cache the results
     *
     * @param evt the mouse position event
     */
    onClick: function(evt) {
      // This loop will be run many times - it must be fast
      // TODO: rewrite to box features into areas of the screen on 
      // addition to reduce the performance hit of calculating
      for(var i = 0; i < this.layer.features.length; i++) {
        if(this.layer.features[i].cache_px === null) {
          this.layer.features[i].cache_px = this.fastGetPx(
            new OpenLayers.LonLat(
              this.layer.features[i].geometry.x,
              this.layer.features[i].geometry.y));
        }
        // TODO: write inner test which determines whether cursor is
        // in a circle
        // TODO: deal with multiple-sized features
        if(this.layer.features[i].cache_px &&
           (Math.abs(this.layer.features[i].cache_px.x - evt.xy.x) < this.featureSize) && 
           (Math.abs(this.layer.features[i].cache_px.y - evt.xy.y) < this.featureSize)) {
             this.clickedFeature(this.layer.features[i], evt);
             return;
        }
      }
      return;
    },

    clickedFeature: function() {},

    /**
     * When the map moves, the pixel position of all points change, so flush
     * the cache. The cache is rebuilt on the first call to onPause
     */
    flushCache: function() {
      for(var i = 0; i < this.layer.features.length; i++) {
        this.layer.features[i].cache_px = null;
      }
      this.extent_cache = null;
      this.resolution_cache = null;
    },

    /**
     * The onMove function is called for every time that the mouse moves a
     * substantial amount; do nothing here yet, although this will likely 
     * deselect the point
     */
    onMove: function(evt) {
    }
});
