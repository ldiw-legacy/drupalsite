<?php?>
<div id="block-<?php print $block -> module . '-' . $block -> delta;?>" class="clear-block block block-<?php print $block->module ?>">
    <?php if (!empty($block->subject)):
    ?>
    <div class="hgroup">
        <h2><?php print $block->subject
        ?></h2>
    </div>
    <?php endif;?>

    <div class="content">
        <?php print $block->content
        ?>
    </div>
</div>