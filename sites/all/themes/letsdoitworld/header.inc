<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
    <head>
        <title><?php print $head_title
            ?></title>
        <?php print $head;?>
        <?php print $styles
        ?>
        <?php print $scripts
        ?>
    </head>
    <body class="<?php print $body_classes;?> <?php
      if ($admin_menu != '') { echo 'ldiw-admin';
      }
 ?>">
        <?php echo $admin_menu
        ?>
        <div id="wrap-outer">
            <div id="mainnav-section" role="navigation">
                <p id="logo">
                    <a href="<?php
                  if ($language -> language == 'en') { echo base_path();
                  } else { echo base_path() . $language -> language;
                  }
 ?>" rel="start" title="Let's do it!"><img src="<?php print $logo;?>" alt="Let's do it!" /></a>
                </p>
                <div id="mainnav">
                    <?php global $user; print theme('links',array_merge($primary_links,$user->uid ? array(array('title' => t('Logout'),'attributes'=>array('title'=>t('Logout')),'href'=>'logout')) : array(array('title' => t('Login'),'attributes'=>array('title'=>t('Login')),'href'=>'user/login'))));
                    ?>
                </div>
            </div>
            <div id="header-outer">
<div id="header">