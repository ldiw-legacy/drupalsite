<?php
// $Id: wfs-getcapabilities.tpl.php,v 1.4.2.5 2010/05/18 13:06:36 tmcw Exp $
/**
 * @file Response to GetCapabilities request
 * @global $feature_types
 * @global $site_name
 */
?>
<?php echo '<?xml version="1.0"?>'; ?>
<wfs:WFS_Capabilities xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.opengis.net/wfs" xmlns:wfs="http://www.opengis.net/wfs" xmlns:ows="http://www.opengis.net/ows" xmlns:gml="http://www.opengis.net/gml" xmlns:ogc="http://www.opengis.net/ogc" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:it.geosolutions="http://www.geo-solutions.it" xmlns:tiger="http://www.census.gov" xmlns:sde="http://geoserver.sf.net" xmlns:drupal="http://drupal.org/project/wfs" xmlns:sf="http://www.openplans.org/spearfish" xmlns:nurc="http://www.nurc.nato.int" version="1.1.0" xsi:schemaLocation="http://www.opengis.net/wfs http://schemas.opengis.net/wfs/1.1.0/wfs.xsd" updateSequence="57">
	<ows:ServiceIdentification>
    <ows:Title><?php echo $site_name; ?></ows:Title>
		<ows:Abstract>Drupal WFS Server</ows:Abstract>
		<ows:Keywords>
			<ows:Keyword>WFS</ows:Keyword>
		</ows:Keywords>
		<ows:ServiceType>WFS</ows:ServiceType>
		<ows:ServiceTypeVersion>1.1.0</ows:ServiceTypeVersion>
		<ows:Fees>NONE</ows:Fees>
		<ows:AccessConstraints>NONE</ows:AccessConstraints>
	</ows:ServiceIdentification>
	<ows:ServiceProvider>
		<ows:ProviderName>Drupal</ows:ProviderName>
		<ows:ServiceContact>
			<ows:IndividualName></ows:IndividualName>
			<ows:PositionName></ows:PositionName>
			<ows:ContactInfo>
				<ows:Phone>
					<ows:Voice/>
					<ows:Facsimile/>
				</ows:Phone>
				<ows:Address>
					<ows:City></ows:City>
					<ows:AdministrativeArea/>
					<ows:PostalCode/>
					<ows:Country></ows:Country>
				</ows:Address>
			</ows:ContactInfo>
		</ows:ServiceContact>
	</ows:ServiceProvider>
	<ows:OperationsMetadata>
		<ows:Operation name="GetCapabilities">
			<ows:DCP>
				<ows:HTTP>
					<ows:Get xlink:href="<?php echo $view_url; ?>"/>
					<ows:Post xlink:href="<?php echo $view_url; ?>"/>
				</ows:HTTP>
			</ows:DCP>
			<ows:Parameter name="AcceptVersions">
				<ows:Value>1.1.0</ows:Value>
			</ows:Parameter>
			<ows:Parameter name="AcceptFormats">
				<ows:Value>text/xml</ows:Value>
			</ows:Parameter>
		</ows:Operation>
		<ows:Operation name="DescribeFeatureType">
			<ows:DCP>
				<ows:HTTP>
					<ows:Get xlink:href="<?php echo $view_url; ?>"/>
					<ows:Post xlink:href="<?php echo $view_url; ?>"/>
				</ows:HTTP>
			</ows:DCP>
			<ows:Parameter name="outputFormat">
				<ows:Value>text/xml; subtype=gml/3.1.1</ows:Value>
			</ows:Parameter>
		</ows:Operation>
		<ows:Operation name="GetFeature">
			<ows:DCP>
				<ows:HTTP>
					<ows:Get xlink:href="<?php echo $view_url; ?>"/>
					<ows:Post xlink:href="<?php echo $view_url; ?>"/>
				</ows:HTTP>
			</ows:DCP>
			<ows:Parameter name="resultType">
				<ows:Value>results</ows:Value>
				<ows:Value>hits</ows:Value>
			</ows:Parameter>
			<ows:Parameter name="outputFormat">
				<ows:Value>text/xml; subtype=gml/3.1.1</ows:Value>
			</ows:Parameter>
			<ows:Constraint name="LocalTraverseXLinkScope">
				<ows:Value>2</ows:Value>
			</ows:Constraint>
		</ows:Operation>
		<ows:Operation name="GetGmlObject">
			<ows:DCP>
				<ows:HTTP>
					<ows:Get xlink:href="<?php echo $view_url; ?>"/>
					<ows:Post xlink:href="<?php echo $view_url; ?>"/>
				</ows:HTTP>
			</ows:DCP>
		</ows:Operation>
	</ows:OperationsMetadata>

	<FeatureTypeList>
		<Operations>
			<Operation>Query</Operation>
		</Operations>
    <?php foreach($feature_types as $feature_type): ?>
		<FeatureType xmlns:drupal="http://drupal.org/project/wfs">
      <Name>drupal:<?php echo $feature_type['view_name']; ?></Name>
      <Title><?php echo       $feature_type['view_name']; ?></Title>
      <Abstract><?php echo    $feature_type['view_description']; ?></Abstract>
			<ows:Keywords>
				<!-- <ows:Keyword></ows:Keyword> -->
			</ows:Keywords>
			<DefaultSRS>urn:x-ogc:def:crs:EPSG:4326</DefaultSRS>
			<ows:WGS84BoundingBox>
				<ows:LowerCorner>-90.0 -180.0</ows:LowerCorner>
				<ows:UpperCorner>90.0 180.0</ows:UpperCorner>
			</ows:WGS84BoundingBox>
		</FeatureType>
    <?php endforeach; ?>
	</FeatureTypeList>

	<ogc:Filter_Capabilities>
		<ogc:Spatial_Capabilities>
			<ogc:GeometryOperands>
				<ogc:GeometryOperand>gml:Envelope</ogc:GeometryOperand>
				<ogc:GeometryOperand>gml:Point</ogc:GeometryOperand>
				<ogc:GeometryOperand>gml:LineString</ogc:GeometryOperand>
				<ogc:GeometryOperand>gml:Polygon</ogc:GeometryOperand>
			</ogc:GeometryOperands>
			<ogc:SpatialOperators>
				<ogc:SpatialOperator name="Disjoint"/>
				<ogc:SpatialOperator name="Equals"/>
				<ogc:SpatialOperator name="DWithin"/>
				<ogc:SpatialOperator name="Beyond"/>
				<ogc:SpatialOperator name="Intersects"/>
				<ogc:SpatialOperator name="Touches"/>
				<ogc:SpatialOperator name="Crosses"/>
				<ogc:SpatialOperator name="Contains"/>
				<ogc:SpatialOperator name="Overlaps"/>
				<ogc:SpatialOperator name="BBOX"/>
			</ogc:SpatialOperators>
		</ogc:Spatial_Capabilities>
		<ogc:Scalar_Capabilities>
			<ogc:LogicalOperators/>
			<ogc:ComparisonOperators>
				<ogc:ComparisonOperator>LessThan</ogc:ComparisonOperator>
				<ogc:ComparisonOperator>GreaterThan</ogc:ComparisonOperator>
				<ogc:ComparisonOperator>LessThanEqualTo</ogc:ComparisonOperator>
				<ogc:ComparisonOperator>GreaterThanEqualTo</ogc:ComparisonOperator>
				<ogc:ComparisonOperator>EqualTo</ogc:ComparisonOperator>
				<ogc:ComparisonOperator>NotEqualTo</ogc:ComparisonOperator>
				<ogc:ComparisonOperator>Like</ogc:ComparisonOperator>
				<ogc:ComparisonOperator>Between</ogc:ComparisonOperator>
				<ogc:ComparisonOperator>NullCheck</ogc:ComparisonOperator>
			</ogc:ComparisonOperators>
			<ogc:ArithmeticOperators>
				<ogc:SimpleArithmetic/>
				<ogc:Functions>
					<ogc:FunctionNames>
						<ogc:FunctionName nArgs="0">Concatenate</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">contains</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">convert</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">cos</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">crosses</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">dateFormat</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">dateParse</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">difference</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">dimension</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">disjoint</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">distance</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">endPoint</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">env</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">envelope</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">EqualInterval</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">equalsExact</ogc:FunctionName>
						<ogc:FunctionName nArgs="3">equalsExactTolerance</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">equalTo</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">exp</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">exteriorRing</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">floor</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">geometryType</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">geomFromWKT</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">geomLength</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">getX</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">getY</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">getZ</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">greaterEqualThan</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">greaterThan</ogc:FunctionName>
						<ogc:FunctionName nArgs="0">id</ogc:FunctionName>
						<ogc:FunctionName nArgs="0">Interpolate</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">intersection</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">intersects</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">isClosed</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">isEmpty</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">isLike</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">isNull</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">isRing</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">isSimple</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">isValid</ogc:FunctionName>
						<ogc:FunctionName nArgs="3">isWithinDistance</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">length</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">lessEqualThan</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">lessThan</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">log</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">max</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">min</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">not</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">notEqualTo</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">numberFormat</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">numGeometries</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">numInteriorRing</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">numPoints</ogc:FunctionName>
						<ogc:FunctionName nArgs="3">offset</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">overlaps</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">parseBoolean</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">parseDouble</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">parseInt</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">parseLong</ogc:FunctionName>
						<ogc:FunctionName nArgs="0">pi</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">pointN</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">pow</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">PropertyExists</ogc:FunctionName>
						<ogc:FunctionName nArgs="0">random</ogc:FunctionName>
						<ogc:FunctionName nArgs="0">Recode</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">relate</ogc:FunctionName>
						<ogc:FunctionName nArgs="3">relatePattern</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">rint</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">round</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">sin</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">sqrt</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">startPoint</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">strConcat</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">strEndsWith</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">strEqualsIgnoreCase</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">strIndexOf</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">strLastIndexOf</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">strLength</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">strMatches</ogc:FunctionName>
						<ogc:FunctionName nArgs="4">strReplace</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">strStartsWith</ogc:FunctionName>
						<ogc:FunctionName nArgs="3">strSubstring</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">strSubstringStart</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">strToLowerCase</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">strToUpperCase</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">strTrim</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">symDifference</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">toDegrees</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">toRadians</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">touches</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">toWKT</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">union</ogc:FunctionName>
						<ogc:FunctionName nArgs="1">vertices</ogc:FunctionName>
						<ogc:FunctionName nArgs="2">within</ogc:FunctionName>
					</ogc:FunctionNames>
				</ogc:Functions>
			</ogc:ArithmeticOperators>
		</ogc:Scalar_Capabilities>
		<ogc:Id_Capabilities>
			<ogc:FID/>
			<ogc:EID/>
		</ogc:Id_Capabilities>
	</ogc:Filter_Capabilities>
</wfs:WFS_Capabilities>
