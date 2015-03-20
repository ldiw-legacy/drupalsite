<div class="comment<?php if ($comment->status == COMMENT_NOT_PUBLISHED) print ' comment-unpublished'; ?> <?php print $zebra; ?>">
  <?php if ($picture) {
  print $picture;
} ?>
  <div class="content"><?php print $content; ?></div>
  <div class="comment-meta">
    <div class="submitted"><?php print $submitted; ?></div>
    <?php if($links){?><div class="meta">
    <div class="links"><?php print $links; ?></div>
    </div><?php } ?>
  </div>
</div>