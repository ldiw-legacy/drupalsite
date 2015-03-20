<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <!--[if lte IE 6]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie6.css";</style><![endif]-->
    <!--[if IE 7]><style type="text/css" media="all">@import "<?php print $base_path . path_to_theme() ?>/css/ie7.css";</style><![endif]-->
    <?php print $scripts; ?>
  </head>

  <body class="<?php print $body_classes; ?>">
    
    <div id="skip"><a href="#content">Skip to Content</a> <a href="#navigation">Skip to Navigation</a></div>
    
    <?php if ($leaderboard): ?>
    <div id="leaderboard" class="clearfix"><div id="leaderboard-inner" class="inner">
      <?php print $leaderboard; ?>
    </div></div><!-- #leaderboard -->
    <?php endif; ?> 
    
    <div id="topbar" class="clearfix"><div id="topbar-inner" class="inner">
      
      <?php if (!empty($primary_links)): ?>
        <div id="primary-links" class="menu">
          <?php if (!empty($primary_links)){ print theme('links', $primary_links, array('id' => 'primary', 'class' => 'links primary-links')); } ?>
        </div> <!-- /primary-links -->
      <?php endif; ?>
      
      <?php print $search_box; ?>
      
      <div id="logo">
        <?php if (!empty($logo)): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
          </a>
        <?php endif; ?>
      </div><!-- #logo -->
      
      </div></div><!-- #topbar -->
      
    <div id="page">

    <!-- ______________________ HEADER _______________________ -->

    <div id="header" class="clearfix">

        <div id="name-and-slogan">
          <?php if (!empty($site_name)): ?>
            <h1 id="site-name">
              <a href="<?php print $front_page ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
          <?php if (!empty($site_slogan)): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /name-and-slogan -->

      <?php if ($header): ?>
        <div id="header-region" class="clearfix">
          <?php print $header; ?>
        </div>
      <?php endif; ?>

    </div> <!-- /header -->

    <?php if ($navbar): ?>
      <div id="nav" class="menu clearfix">
        <?php print $navbar; ?>
      </div> <!-- /nav -->
    <?php endif; ?>

    <!-- ______________________ MAIN _______________________ -->

    <div id="main" class="clearfix">
      
      <?php if ($secondary_content): ?>
        <div id="secondary-content" class="region clearfix clear">
          <div id="secondary-content-inner" class="inner">
            <?php print $secondary_content; ?>
          </div>
        </div>
      <?php endif; ?> <!-- /secondary-content -->
      
      <div id="content">
        <div id="content-inner" class="inner column center">
          
          <?php if ($content_top): ?>
            <div id="content-top">
              <?php print $content_top; ?>
            </div> <!-- /#content-top -->
          <?php endif; ?>

          <?php if ($breadcrumb || $title || $mission || $messages || $help || $tabs): ?>
            <div id="content-header" class="clearfix">

              <?php print $breadcrumb; ?>

              <?php if ($title): ?>
                <h1 class="title"><?php print $title; ?></h1>
              <?php endif; ?>

              <?php if ($mission): ?>
                <div id="mission"><?php print $mission; ?></div>
              <?php endif; ?>

              <?php print $messages; ?>

              <?php print $help; ?> 

              <?php if ($tabs): ?>
                <div class="tabs"><?php print $tabs; ?></div>
              <?php endif; ?>

            </div> <!-- /#content-header -->
          <?php endif; ?>

          <div id="content-area">
            <?php print $content; ?>
          </div> <!-- /#content-area -->

          <?php print $feed_icons; ?>

          <?php if ($content_bottom): ?>
            <div id="content-bottom" class="clearfix">
              <?php print $content_bottom; ?>
            </div><!-- /#content-bottom -->
          <?php endif; ?>

          </div>
        </div> <!-- /content-inner /content -->

        <?php if ($left): ?>
          <div id="sidebar-first" class="column sidebar first clearfix">
            <div id="sidebar-first-inner" class="inner">
              <?php print $left; ?>
            </div>
          </div>
        <?php endif; ?> <!-- /sidebar-left -->

        <?php if ($right): ?>
          <div id="sidebar-second" class="column sidebar second clearfix">
            <div id="sidebar-second-inner" class="inner">
              <?php print $right; ?>
            </div>
          </div>
        <?php endif; ?> <!-- /sidebar-second -->

      </div> <!-- /main -->
      
      <?php if ($tertiary_content): ?>
        <div id="tertiary-content" class="region clearfix">
          <div id="tertiary-content-inner" class="inner">
            <?php print $tertiary_content; ?>
          </div>
        </div>
      <?php endif; ?> <!-- /tertiary-content -->

      <!-- ______________________ FOOTER _______________________ -->

      <?php if(!empty($footer_message) || !empty($footer_block)): ?>
        <div id="footer" class="clearfix"><div id="footer-inner" class="inner">
          <?php print $footer_message; ?>
          <?php print $footer_block; ?>
          <?php if (!empty($secondary_links)): ?>
            <div id="secondary-links" class="menu">
              <?php if (!empty($secondary_links)){ print theme('links', $secondary_links, array('id' => 'secondary', 'class' => 'links secondary-links')); } ?>
            </div> <!-- /secondary-links -->
          <?php endif; ?>
        </div></div> <!-- /footer -->
      <?php endif; ?>

    </div> <!-- /page -->
    <?php print $closure; ?>
  </body>
</html>