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
  <?php print $scripts ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
</head>

<body>
<?php if (!isset($_REQUEST['embed'])): ?>
	<div id="header">
		<div class="wrapper clearfix">
			<?php include 'menu.inc'?>
		</div>
	</div>
<?php endif; ?>
	
  <div id="map"><?php print $content; ?></div>
  <!--div id="map-sidebar">
	<div id="primary"><?php global $user; print theme('links',array_merge($primary_links,$user->uid ? array(array('title' => t('Logout'),'attributes'=>array('title'=>t('Logout')),'href'=>'logout')) : array(array('title' => t('Login'),'attributes'=>array('title'=>t('Login')),'href'=>'user/login')))); ?></div>
    <div id="infopane">
      <div class="inner">
        <h1>Tobraloconi</h1>
        <h2>Cirrecone parish, Parma, italy</h2>
        <p>
          Tehakse korda nelja linnaosa ühendav park - täpsemalt värvitakse üle sillad, korrastatakse laste atraktsioonid ja tehakse puhtaks jooksu/jalgratta rada. Korda tehtud asjad peavad vastu paar aastat veel ning pinkide jms heakorra eest hakkab vastutust kandma linnavalitsus
        </p>
        <img src="images/italy.jpg?1" alt="Pizza italiano" />
        <p class="joinbtn">
          <a href="#">Join cleaning up here</a>
        </p>
        <div class="empty">
          <h1>Find info</h1>
          by clicking on the map points
        </div>
      </div>
    </div>
    <div id="logobar">
      <a href="#"><img src="images/logo-map.png?1" alt="" /></a>
    </div>
  </div-->

<script type="text/javascript" src="../sites/all/themes/ldiw2/javascripts/jquery.js"></script>




<?php include 'analytics.inc'?> 
</body>
</html>
