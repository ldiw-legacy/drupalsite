$Id: README.txt,v 1.3.2.5 2010/07/02 19:29:40 tmcw Exp $

# WFS Module

The WFS module makes a View into a very simple WFS provider. Its main 
intended use is for Drupal-hosted data to be renderable by GeoServer 
to avoid complications of presenting large numbers of dots on a map 
or complex data on a map.

## Provides

### OpenLayers

* VirtualVector layer type
* VirtualHover behavior
* VirtualClick behavior

### Views

* WFS display
* WFS style type 

## Tutorial

# NOTE

OpenLayers has an [outstanding bug for CDATA in WFS](http://trac.openlayers.org/ticket/2658)
which will prevent this module from working unless it is fixed there, or you use a patched OpenLayers library.
A patched library is included with this module in js/OpenLayers.js - you'll need to set the OpenLayers theme path 
to the default - http://openlayers.org/api/theme/default/style.css

### GeoServer Setup

WFS data is sent from place to place in namespaces, which broadly define
which systems are providing data. This module serves all data in the namespace

    http://drupal.org/project/wfs

So it is necessary to add a new Workspace with this namespace.

1. Create a view, add a WFS display to it.
2. Give the WFS display a path
3. Create a workspace in GeoServer with http://drupal.org/project/wfs
   as its namespace
4. Create a WFS store in GeoServer within that workspace
5. Create layers from the types exposed from that store

## Requirements

* Views
* OpenLayers
* CTools 

## Compatible Software

### Desktop

* [QGIS](http://www.qgis.org/) w/ WFS Plugin

### Web

* [GeoServer](http://geoserver.org/)
* [OpenLayers](http://openlayers.org/)

## Credits

* [tmcw](http://drupal.org/user/12664)
* Icon by [Saman Bemel Benrud](http://www.flickr.com/photos/samanpwbb/)
