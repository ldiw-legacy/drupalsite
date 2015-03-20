<?php
// $Id: wfs-describefeaturetype.tpl.php,v 1.5.2.4 2010/05/06 18:18:40 tmcw Exp $
/**
 * @global $feature_type
 * @global $field_names
 */
?>
<xsd:schema
  elementFormDefault="qualified" 
  targetNamespace="http://drupal.org/project/wfs" 
  xmlns:gml="http://www.opengis.net/gml" 
  xmlns:drupal="http://drupal.org/project/wfs" 
  xmlns:xsd="http://www.w3.org/2001/XMLSchema">
  <xsd:import namespace="http://www.opengis.net/gml" 
    schemaLocation="http://schemas.opengis.net/gml/3.1.1/base/gml.xsd"/>
  <xsd:import namespace="http://www.opengis.net/gml" 
    schemaLocation="http://schemas.opengis.net/gml/3.1.1/base/gml.xsd"/>
    <xsd:complexType name="<?php echo $feature_type; ?>Type">
    <xsd:complexContent>
      <xsd:extension base="gml:AbstractFeatureType">
        <xsd:sequence>
          <xsd:element maxOccurs="1" minOccurs="0" 
            name="geometry" 
            nillable="true" 
            type="gml:PointPropertyType"/>
          <?php foreach($field_names as $field_name): ?>
            <xsd:element maxOccurs="1" minOccurs="0" 
              name="<?php echo $field_name; ?>" 
              nillable="true" type="xsd:string"/> 
          <?php endforeach; ?>
        </xsd:sequence>
      </xsd:extension>
    </xsd:complexContent>
  </xsd:complexType>
  <xsd:element name="<?php echo $feature_type; ?>" 
    substitutionGroup="gml:_Feature" 
    type="drupal:<?php echo $feature_type;?>Type"/> 
</xsd:schema> 
