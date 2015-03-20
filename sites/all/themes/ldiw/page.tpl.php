<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <?php print $head ?>
  <title><?php print $head_title ?></title>
  <?php print $styles ?>
  <?php print $scripts ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
</head>

<body>
<?php if (!isset($_REQUEST['embed'])): ?>
<div id="wrap">
<?php endif; ?>

<?php if (!isset($_REQUEST['embed'])): ?>
	<div id="header">
		<div class="wrap_inner clearfix">
			<a href="/" id="logo"><img src="<?php print base_path() . path_to_theme(); ?>/images/logo.png" width="31" height="25"></a>
			<div id="mainmenu" class="right">
				<div id="primary"><?php print theme('links',$primary_links); ?></div>
				<div id="secondary"><?php print theme('links',$secondary_links); ?></div>
			</div>
		</div>
	</div>

	<?php print $header; ?>

<div id="body">
<?php endif; ?>

	<div class="wrap_inner">
		<?php if (!isset($_REQUEST['embed'])): ?>
			<?php if ($right): ?>
				<div id="right_menu">
					<?php print $right; ?>
				</div>
			<?php endif; ?>

			<?php if ($left): ?>
				<div id="left_menu">
					<?php print $left; ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<div id="content">
			<?php if (!isset($_REQUEST['embed'])): ?>
				<?php if ($title): ?><h1 class="title"><?php print $title; ?></h1><?php endif; ?>
			<?php endif; ?>
			<?php if ($tabs): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
			<?php if ($show_messages): print $messages; endif; ?>
			<?php print $help; ?>
			<?php print $content; ?>
		</div>
		<div class="clearer"></div>
	</div>

<?php if (!isset($_REQUEST['embed'])): ?>
</div>
</div>
	<div id="footer">
		<div class="wrap_inner">
			<ul class="clearfix">
				<li><a linkindex="24" multilinks-offsetheight="16" multilinks-offsetwidth="30" multilinks-offsetleft="11" multilinks-offsettop="756" multilinks-visible="true" href="https://twitter.com/letsdoitworld"><img title="Twitter" alt="Twitter" src="<?php print base_path() . path_to_theme(); ?>/images/twitter.png?1" /></a>&nbsp;&nbsp;&nbsp;<a linkindex="25" multilinks-offsetheight="16" multilinks-offsetwidth="30" multilinks-offsetleft="53" multilinks-offsettop="756" multilinks-visible="true" href="http://www.facebook.com/group.php?gid=90819190212&amp;ref=ts"><img title="Facebook" alt="Facebook" src="<?php print base_path() . path_to_theme(); ?>/images/facebook.png?1" /></a>&nbsp;&nbsp;&nbsp;<a linkindex="26" multilinks-offsetheight="16" multilinks-offsetwidth="30" multilinks-offsetleft="95" multilinks-offsettop="756" multilinks-visible="true" href="/news.rss"><img title="RSS" alt="RSS" src="<?php print base_path() . path_to_theme(); ?>/images/rss.png?1" /></a>&nbsp;&nbsp;&nbsp;<a linkindex="27" multilinks-offsetheight="16" multilinks-offsetwidth="31" multilinks-offsetleft="137" multilinks-offsettop="756" multilinks-visible="true" href="http://www.flickr.com/groups/letsdoitworld/"><img src="<?php print base_path() . path_to_theme(); ?>/images/flickr-icon-sm2.png?64616" alt="" id="eimg38" style="z-index: 0;" height="31" width="31" /></a>&nbsp;&nbsp;<a linkindex="28" multilinks-offsetheight="16" multilinks-offsetwidth="35" multilinks-offsetleft="176" multilinks-offsettop="756" multilinks-visible="true" href="http://www.linkedin.com/groups?gid=1999886&amp;trk=myg_ugrp_ovr"><img src="<?php print base_path() . path_to_theme(); ?>/images/icon-linkedin.png?54271" alt="" id="eimg37" style="z-index: 0;" height="30" width="35" /></a></li>
			</ul>
		</div>
	</div>
<?php endif; ?>

<?php print $closure ?>
</body>
</html>
