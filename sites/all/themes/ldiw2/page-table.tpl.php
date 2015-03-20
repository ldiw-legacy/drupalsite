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
<div id="wrap">
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

<?php endif; ?>

			<?php if (!isset($_REQUEST['embed'])): ?>
				<?php if ($title): ?><h1 class="title"><?php print $title; ?></h1><?php endif; ?> 
				<?php endif; ?>
			<?php if ($tabs): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>

			</div>
	
	<!-- // bluebox -->
	<div id="body">
	<div class="wrapper clearfix">



			<?php if ($show_messages): print $messages; endif; ?>
			<?php print $help; ?>
			<?php print $content; ?>


		<div class="clearer"></div>
	</div>

<?php if (!isset($_REQUEST['embed'])): ?>
</div>
<!-- //body -->

	</div>
 
	<?php include 'footer.inc'?> 

<?php endif; ?>
<?php include 'analytics.inc'?> 
<?php print $closure ?>
</body>
</html>
