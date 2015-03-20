<?php
// $Id: wfs-exception.tpl.php,v 1.1.2.1 2010/03/18 17:50:49 tmcw Exp $
/**
 * @file Response to invalid request
 * @global $exceptionCode
 * @global $exceptionText
 */
?>
<ows:ExceptionReport version="1.0.0"
  xsi:schemaLocation="http://www.opengis.net/ows http://localhost:8080/geoserver/schemas/ows/1.0.0/owsExceptionReport.xsd"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:ows="http://www.opengis.net/ows"> 
  <ows:Exception exceptionCode="<?php echo $exceptionCode; ?>"> 
    <ows:ExceptionText><?php echo $exceptionText; ?></ows:ExceptionText> 
  </ows:Exception> 
</ows:ExceptionReport> 
