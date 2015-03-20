<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <?php print $head ?>
  <title><?php print $head_title ?></title>
  <link rel="stylesheet" href="../sites/all/themes/ldiw2/map.css" type="text/css" media="all" />
<?php if (isset($_REQUEST['embed'])): ?>
  <link rel="stylesheet" href="../sites/all/themes/ldiw2/embed.css" type="text/css" media="all" />
<?php endif; ?>
  <?php print $styles ?>
  
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
</head>
<body>
<?php if (!isset($_REQUEST['embed'])): ?>
	<div id="header">
		<div class="wrapper clearfix">
				<div id="mainnav-section" role="navigation">
		<p id="logo"><a href="<?php print base_path(); ?>" rel="start" title="Let's do it!"><img src="<?php print $logo; ?>" alt="Let's do it!" /></a></p>
		<div id="mainnav">
			<?php global $user; print theme('links',array_merge($primary_links,$user->uid ? array(array('title' => t('Logout'),'attributes'=>array('title'=>t('Logout')),'href'=>'logout')) : array(array('title' => t('Login'),'attributes'=>array('title'=>t('Login')),'href'=>'user/login')))); ?>
		</div>
	</div>
		</div>
	</div>
<?php endif; ?>
	
  <div id="ap"><?php print $content; ?></div>
<?php print $scripts ?>
<script type="text/javascript" src="../sites/all/themes/ldiw2/javascripts/jquery.js"></script>
<?php include 'analytics.inc'?> 
</body>
</html>
