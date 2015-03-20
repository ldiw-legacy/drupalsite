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

<?php endif; ?>
	<div id="header">
		<div class="wrapper clearfix">
			<?php include 'logo.inc'?>
			<?php include 'menu.inc'?>				
		</div>
	</div>
	<!-- //header -->
<div id="bluebox">
<div class="adminmenu">	
	<div class="xcentered submenu clearfix">
		<?php print $header; ?>
	</div>
</div>

    <div class="wrapper clearfix">
      <h2 class="notabene">World Cleanup 2012</h2>
      <div class="bigtext">Cleanup days in 100 countries: <strong>March 24 - September 25</strong> in <strong>2012</strong>. <br/><strong>Let's clean the world together!</strong></div>
      <div id="frontpage-slider-holder" class="clearfix">
        <div class="slides left">
          <div class="slider-cont slider-cont-active fader-holder" id="tab-whatsup">
            <div class="fader-legend clearfix">
              <span></span>
              <ul class="menu"></ul>
            </div>
             <div class="fader-content">
				<div style="padding:0 330px 0 30px;">
						<object type="application/x-shockwave-flash" data="http://www.youtube.com/p/CE64BAFE6D704287?hl=en_US&amp;fs=1" width="610" height="350">
							<param name="wmode" value="transparent"></param>
							<param name="movie" value="http://www.youtube.com/p/CE64BAFE6D704287?hl=en_US&amp;fs=1"></param><param name="allowFullScreen" value="true"></param>
							<param name="allowscriptaccess" value="always"></param></object> 
				</div>
				<!-- slider photos // -->
            </div> 
          </div>
          <div class="slider-cont" id="tab-about" style="background: #ffffff url('/sites/all/themes/ldiw2/images/planet-6.jpg') no-repeat left top;">
            <div class="slider-text">
					<?php print $about_tab; ?>
			</div>
          </div>
          <div class="slider-cont" id="tab-who">
            <div class="slider-text">
					<?php print $who_tab; ?>
			</div>
          </div>
          <div class="slider-cont" id="tab-country">
            <div class="slider-text">
					<?php print $country_tab; ?>
			</div>
          </div>	
          <div class="slider-cont" id="tab-news">
            <div class="slider-text">
                    <?php print $news_tab; ?>
			</div>
          </div>
		  
        </div>
        <!-- //slides -->
        <div class="slider-menu-holder right">
          <ul>
		    <li class="active" id="whatsup"><a href="#whatsup"></a></li>
            <li><a href="#about">World Cleanup 2012</a></li>
			<li><a href="#who">Who are we?</a></li>
            <li><a href="#country">My country</a></li>	
            <li><a href="#news">News</a></li>
          </ul>
        </div>
        <!-- //slider-menu-holder -->
      </div>
      <!-- //frontpage-slider-holder -->


	        <div class="centered" id="bluebox-buttons">
        <ul class="menu-btn">
          <li>
            <a href="start" class="bluebox-btn bluebox-btn-green bluebox-btn-bold">Start a cleanup</a>
          </li>
          <li>
            <a href="mapthewaste" class="bluebox-btn bluebox-btn-blue">Map the waste</a>
          </li>
        </ul>
      </div>
      <!-- //bluebox-buttons -->
    </div>
    <!-- //wrapper --> 	  
</div>	  
<!-- //bluebox -->
	<div id="body" class="frontpage">
    <div class="wrapper clearfix">
		
      <!-- <div class="bigtext">
        &nbsp;
      </div>
      &nbsp; -->
    </div> 




<?php if (!isset($_REQUEST['embed'])): ?>
	</div>
	<!-- //body -->
</div>
<!-- //wrap -->
	<?php include 'footer.inc'?> 
	
<?php endif; ?>

<?php print $closure ?>
<script type="text/javascript" src="/sites/all/themes/ldiw2/javascripts/jquery.js"></script>
<script type="text/javascript" src="/sites/all/themes/ldiw2/javascripts/scripts.js"></script>
<script type="text/javascript">
  $(function() {
    LetsDoIt.frontPageTabs.init();
    LetsDoIt.fader.init();
  });
</script>
<?php include 'analytics.inc'?>
</body>
</html>
