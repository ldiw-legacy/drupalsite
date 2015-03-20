<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <?php print $head ?>
  <title><?php print $head_title ?></title>
  <?php print $styles ?>
  <?php print $scripts ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>

</head>

<!--[if lt IE 9]><body class="ltie9"><![endif]-->
<!--[if !IE]><!--><body><!--<![endif]-->
<?php if (!isset($_REQUEST['embed'])): ?>
<div id="wrap" class="<?php print $body_classes; ?>">
<?php endif; ?>

<?php if (!isset($_REQUEST['embed'])): ?>
	<div id="header">
		<div class="wrapper clearfix">
		<?php include 'logo.inc'?>
		<?php include 'menu.inc'?>			
		</div>
	</div>
	<!-- //header -->
<div id="bluebox">

<!--div id="adminmenu"-->
    <div class="adminmenu">
	<div class="xcentered submenu clearfix">
		<?php print $header; ?>
	</div>
	</div>
<!--/div-->

	<?php if ($title): ?><h1 class="title"><?php print $title; ?></h1><?php endif; ?> 
	<?php if ($tabs): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
	</div>

	<!-- // bluebox -->
	<div id="body">
	<div class="wrapper clearfix">
		<?php if (!empty($secondary_links)): ?>
		<div class="sidebar left">
			<?php print theme('links',$secondary_links); ?>
		</div>
		<?php endif; ?>

		<div class="rightbar <?php if (!empty($secondary_links)) { echo "rightmargin"; } ?>">
			<?php if ($show_messages): print $messages; endif; ?>
			<?php print $help; ?>

<?php endif; ?>
	<p>Countries regarding World Cleanup 2012: <span style="font-weight:bold;color:green;">green</span> - participating; <span style="font-weight:bold;color:yellow;">yellow</span>  - creating a team; <span style="font-weight:bold;color:red;">red</span> - not participating.</p>
	<iframe width="655" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://world.geopedia.si/GeopediaGoogleMaps.html?widgetId=8wMF1YDyKdYwFNoVTgpvjVondjAQxqwRSJsCMponnvoNrW2deHfE9sHeif6ehsYvLn2iCQ2H6t3uJ7fyYefmTCqoytIOWWL4Itf"></iframe>

			<?php print $content; ?>
 
			
<?php if (!isset($_REQUEST['embed'])): ?>
		</div>

		<div class="clearer"></div>
	</div>
</div>
<!-- //body -->

	</div>
	<?php include 'footer.inc'?> 
 
<?php endif; ?>

<?php print $closure ?>
<?php include 'analytics.inc'?> 
</body>
</html>
