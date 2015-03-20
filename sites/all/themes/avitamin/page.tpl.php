<?php // $Id: page.tpl.php,v 1.1.2.3 2010/08/09 13:14:56 finex Exp $  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
<title><?php print $head_title ?></title>
<?php print $head; ?>
<?php print $styles ?>
<?php if ($ie6) { ?>
<!--[if lt IE 7]>
<style type="text/css" media="all"><?php print $ie6_style_hack ?></style>
<![endif]-->
<?php } ?>
<?php print $scripts ?>
<script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
</head>
<body class="<?php print $body_classes; ?>">
<div id="page_wrapper"><!--PAGE WRAPPER-->
  <div id="page"><!--PAGE-->
    <div id="top"><!--TOP-->
      <div id="logo"><!--LOGO-->
      <?php if($logo){?>
        <a id="logo-uri" href="<?php print base_path(); ?>" title="<?php print $site_name ?>"><img id="logo-img" src="<?php print $logo; ?>" alt="<?php print $site_name ?>" title="<?php print $site_name ?>" /></a>
      <?php } else { ?>
        <a id="logo-uri" href="<?php print base_path(); ?>" title="<?php print $site_name ?>"><img id="logo-img" src="<?php print base_path() . path_to_theme(); ?>/logo.png" alt="<?php print $site_name ?>" title="<?php print $site_name ?>" /></a>
      <?php } ?>
      </div><!--END LOGO-->
      <div id="navigation"><!--NAVIGATION-->
        <?php if (isset($primary_links)) print menu_tree($menu_name = variable_get('menu_primary_links_source', 'primary-links')); ?>
      </div><!--END NAVIGATION-->
    </div><!--END TOP-->
    <?php if($header){?><div id="header"><!--HEADER-->
      <?php print $header ?>
    </div><!--END HEADER--><?php } ?>
    <div id="container"><!--CONTAINER-->
      <?php if($left){?><div id="sidebar-left" class="sidebar"><!--SIDEBAR LEFT-->
        <?php print $left; ?>
      </div><!--END SIDEBAR LEFT--><?php } ?>
      <div id="content_wrapper"><!--CONTENT WRAPPER-->
        <?php if($breadcrumb){?><div id="breadcrumb"><!--BREADCRUMB-->
          <?php print $breadcrumb ?>
        </div><!--END BREADCRUMB--><?php } ?>
        <?php if($mission){ ?><div id="mission"><!--MISSION-->
          <?php print $mission; ?>
        </div><!--END MISSION--><?php } ?>
        <?php if ($title){?><h1 id="title"><?php print $title ?></h1><?php } ?>
        <?php if ($messages) { print $messages; } ?>
        <?php if ($help) { print $help; } ?>
        <?php if($preface){?><div id="preface"><!--PREFACE-->
          <?php print $preface ?>
        </div><!--END PREFACE--><?php } ?>
        <div id="content"><!--CONTENT-->
          <?php if($tabs){?><div class="tabs"><?php print $tabs ?></div><?php } ?>
          <?php print $content; ?>
        </div><!--END CONTENT-->
        <?php if($postscript){?><div id="postscript"><!--POSTSCRIPT-->
          <?php print $postscript ?>
        </div><!--END POSTSCRIPT--><?php } ?>
      </div><!--END CONTENT WRAPPER-->
      <?php if($right){?><div id="sidebar-right" class="sidebar"><!--SIDEBAR RIGHT-->
        <?php print $right; ?>
      </div><!--END SIDEBAR RIGHT--><?php } ?>
    </div><!--END CONTAINER-->
    <?php if($footer){?><div id="footer"><!--FOOTER-->
      <?php print $footer; ?>
    </div><!--END FOOTER--><?php } ?>
  </div><!--END PAGE-->
  <div id="footer_message"><!--FOOTER MESSAGE-->
    <span id="message"><?php print $footer_message ?></span>
  </div><!--END FOOTER MESSAGE-->
</div><!--END PAGE WRAPPER-->
<?php print $closure ?>
</body>
</html>