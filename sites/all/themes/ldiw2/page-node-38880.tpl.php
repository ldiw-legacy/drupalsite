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
      <div class="bigtext">Let's get together <strong>300 million people</strong> to clean up <strong>100 million tons</strong> of waste!</div>
      <div id="frontpage-slider-holder" class="clearfix">
        <div class="slides left">
          <div class="slider-cont slider-cont-active fader-holder" id="tab-whatsup">
            <div class="fader-legend clearfix">
              <span></span>
              <ul class="menu"></ul>
            </div>
            <div class="fader-content">
              <div class="fader-slide fader-slide-active" title="" style="background: url('/sites/all/themes/ldiw2/images/planet.jpg') no-repeat left top;"></div>
              <div class="fader-slide" title="Their World is almost eaten by them" style="background: url('/sites/all/themes/ldiw2/images/planet-2.jpg') no-repeat left top;"></div>
              <div class="fader-slide" title="Your World is almost eaten by you" style="background: url('/sites/all/themes/ldiw2/images/planet-3.jpg') no-repeat left top;"></div>
              <div class="fader-slide" title="My World is almost eaten by me" style="background: url('/sites/all/themes/ldiw2/images/planet-4.jpg') no-repeat left top;"></div>
              <div class="fader-slide" title="His World is almost eaten by him" style="background: url('/sites/all/themes/ldiw2/images/planet-5.jpg') no-repeat left top;"></div> 
            </div>
          </div>
          <div class="slider-cont" id="tab-about" style="background: #ffffff url('/sites/all/themes/ldiw2/images/planet-6.jpg') no-repeat left top;">
            <div class="slider-text">
					<?php print $about_tab; ?>
			</div>
          </div>
          <div class="slider-cont" id="tab-news">
            <div class="slider-text">
                    <?php print $news_tab; ?>
			</div>
          </div>
          <div class="slider-cont" id="tab-events">
            <div class="slider-text">
                    <?php print $events_tab; ?>
			</div>
          </div>
          <div class="slider-cont" id="tab-videos">
            <div style="padding:0 310px 0 40px;">
                    <object width="620" height="350"><param name="movie" value="http://www.youtube.com/p/CE64BAFE6D704287?hl=en_US&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/p/CE64BAFE6D704287?hl=en_US&fs=1" type="application/x-shockwave-flash" width="620" height="350" allowscriptaccess="always" allowfullscreen="true"></embed></object>
			</div>
          </div>
		  
          <div class="slider-cont" id="tab-country">
            <div class="slider-text">
				<span class="bigtext">
					<div style="width:120px; float:left;">
						Estonia <br/><img title="Website" alt="Website" src="<?php print base_path() . path_to_theme(); ?>/images/www_16.png" /><img title="Twitter" alt="Twitter" src="<?php print base_path() . path_to_theme(); ?>/images/twitter_16.png" /><img title="Facebook" alt="Facebook" src="<?php print base_path() . path_to_theme(); ?>/images/facebook_16.png" /><img title="YouTube" alt="YouTube" src="<?php print base_path() . path_to_theme(); ?>/images/youtube_16.png" />
					</div>
					<div style="width:120px; float:left;">
						Latvia <br/><img title="Website" alt="Website" src="<?php print base_path() . path_to_theme(); ?>/images/www_16.png" /><img title="Twitter" alt="Twitter" src="<?php print base_path() . path_to_theme(); ?>/images/twitter_16.png" /><img title="Facebook" alt="Facebook" src="<?php print base_path() . path_to_theme(); ?>/images/facebook_16.png" /><img title="YouTube" alt="YouTube" src="<?php print base_path() . path_to_theme(); ?>/images/youtube_16.png" />
					</div>					
					<div style="width:120px; float:left;">
						Lithuania <br/><img title="Website" alt="Website" src="<?php print base_path() . path_to_theme(); ?>/images/www_16.png" /><img title="Twitter" alt="Twitter" src="<?php print base_path() . path_to_theme(); ?>/images/twitter_16.png" /><img title="Facebook" alt="Facebook" src="<?php print base_path() . path_to_theme(); ?>/images/facebook_16.png" /><img title="YouTube" alt="YouTube" src="<?php print base_path() . path_to_theme(); ?>/images/youtube_16.png" />
					</div>
					<div style="width:120px; float:left;">
						Slovenia <br/><img title="Website" alt="Website" src="<?php print base_path() . path_to_theme(); ?>/images/www_16.png" /><img title="Twitter" alt="Twitter" src="<?php print base_path() . path_to_theme(); ?>/images/twitter_16.png" /><img title="Facebook" alt="Facebook" src="<?php print base_path() . path_to_theme(); ?>/images/facebook_16.png" /><img title="YouTube" alt="YouTube" src="<?php print base_path() . path_to_theme(); ?>/images/youtube_16.png" />
					</div>					
					<div style="width:120px; float:left;">
						Portugal <br/><img title="Website" alt="Website" src="<?php print base_path() . path_to_theme(); ?>/images/www_16.png" /><img title="Twitter" alt="Twitter" src="<?php print base_path() . path_to_theme(); ?>/images/twitter_16.png" /><img title="Facebook" alt="Facebook" src="<?php print base_path() . path_to_theme(); ?>/images/facebook_16.png" /><img title="YouTube" alt="YouTube" src="<?php print base_path() . path_to_theme(); ?>/images/youtube_16.png" />
					</div>					
					<div style="width:120px; float:left;">
						Romania <br/><img title="Website" alt="Website" src="<?php print base_path() . path_to_theme(); ?>/images/www_16.png" /><img title="Twitter" alt="Twitter" src="<?php print base_path() . path_to_theme(); ?>/images/twitter_16.png" /><img title="Facebook" alt="Facebook" src="<?php print base_path() . path_to_theme(); ?>/images/facebook_16.png" /><img title="YouTube" alt="YouTube" src="<?php print base_path() . path_to_theme(); ?>/images/youtube_16.png" />
					</div>				
					<div style="width:120px; float:left;">
						Brazil <br/><img title="Website" alt="Website" src="<?php print base_path() . path_to_theme(); ?>/images/www_16.png" /><img title="Twitter" alt="Twitter" src="<?php print base_path() . path_to_theme(); ?>/images/twitter_16.png" /><img title="Facebook" alt="Facebook" src="<?php print base_path() . path_to_theme(); ?>/images/facebook_16.png" /><img title="YouTube" alt="YouTube" src="<?php print base_path() . path_to_theme(); ?>/images/youtube_16.png" />
					</div>				
					<div style="width:120px; float:left;">
						Ukraine <br/><img title="Website" alt="Website" src="<?php print base_path() . path_to_theme(); ?>/images/www_16.png" /><img title="Twitter" alt="Twitter" src="<?php print base_path() . path_to_theme(); ?>/images/twitter_16.png" /><img title="Facebook" alt="Facebook" src="<?php print base_path() . path_to_theme(); ?>/images/facebook_16.png" /><img title="YouTube" alt="YouTube" src="<?php print base_path() . path_to_theme(); ?>/images/youtube_16.png" />
					</div>				
Moldova Bulgaria Cambodia India Finland Netherlands Russia Serbia Thai</span>
			</div>            
          </div>
        </div>
        <!-- //slides -->
        <div class="slider-menu-holder right">
          <ul>
		    <li class="active" id="whatsup"><a href="#whatsup"></a></li>
            <li><a href="#about">World Cleanup</a></li>
            <li><a href="#news">News</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#videos">Videos</a></li>			
            <!--li><a href="#country">Your country?</a></li--> 
          </ul>
        </div>
        <!-- //slider-menu-holder -->
      </div>
      <!-- //frontpage-slider-holder -->


	        <div class="centered" id="bluebox-buttons">
        <ul class="menu-btn">
          <li>
            <a href="/join" class="bluebox-btn bluebox-btn-green bluebox-btn-bold">How to join</a>
          </li>
          <li>
            <a href="wastemap" class="bluebox-btn bluebox-btn-blue">World Waste Map</a>
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
        <p>Since 2008 we've been cleaning up one country at a time across three
        continents. More than 5 million people have participated. Now it's time
        to push harder and clean the whole planet once and for all.</p>
      </div>
      Our mission is already featured in the following mediums. Click on the logos to read. -->
    </div> 



	</div>
	<!-- //body -->

	<?php if (!isset($_REQUEST['embed'])): ?>	
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
</body>
</html>
