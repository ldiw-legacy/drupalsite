<?php // $Id: node.tpl.php,v 1.1.2.1 2010/06/19 16:29:51 finex Exp $  ?>
<div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
  <?php if ($page == 0) { ?>
    <h2 class="title"><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  <?php } ?>
  <div class="content"><?php print $content?></div>
  <?php if ($links){ ?><div class="meta">
    <div class="links"><?php print $links ?></div>
  </div><?php }?>
  <?php if ($terms && !$teaser){ ?>
  <span class="tag"><?php print $terms ?></span>
  <?php }?>
</div>