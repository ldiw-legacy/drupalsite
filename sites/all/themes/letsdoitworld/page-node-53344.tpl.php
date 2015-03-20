<?php

include ("header.inc");
?>
<div id="header-content">
    <?php if ($title && $node->type != 'story' && $node->type != 'media'):
    ?><h1 class="title"><?php print $title;?></h1><?php elseif ($title && $node->type == 'story' ):?><h1> News</h1>
	<?php elseif ($title && $node->type == 'media' ):?><h1> Media</h1>
    <?php endif;?>
	
</div>
</div>
</div>

	
  <div id="wrap-inner"><?php print $content; ?></div>
<?php print $scripts ?>
<script type="text/javascript" src="../sites/all/themes/ldiw2/javascripts/jquery.js"></script>
<?php include 'analytics.inc'?> 
</body>
</html>
