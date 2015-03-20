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
<div id="wrap-inner">
    <div id="wrap" class="content">
        <div class="two-cols">
            <div class="col sidebar-left">
                <?php echo $left;?>
            </div>
            <div class="col content" id="content">
                <?php if ($title && $node->type == 'story' ):
                ?><h4 class="title"><?php print $title;?></h4><?php endif;?>
				<?php if ($title && $node->type == 'media' ):
                ?><h4 class="title"><?php print $title;?></h4><?php endif;?>
                <?php if($tabs){
                ?><div class="tabs"><?php print $tabs ?></div><?php }
                ?>
                <?php echo $content_before
                ?>
				<?php print $content;
                ?>
				<?php echo $content_after
                ?>
				<?php echo $content_1
                ?>
            </div>
        </div>
    </div>
</div>
<?php include("footer.inc");
?>
