<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

<?php print $picture ?>

<?php if (!$page): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>

  <div class="content">
    <?php print $content ?>
    <?php print views_embed_view('country_cleanups','default',$node->field_country_code[0]['value']); ?>
	<br />
    <?php print views_embed_view('country_contacts','default',$node->field_country_code[0]['value']); ?>
	<br />
    <?php print views_embed_view('country_get_togethers','default',$node->field_country_code[0]['value']); ?>
	<br />
	<?php print views_embed_view('country_news','default',$node->field_country_code[0]['value']); ?>
	<br/>
  </div>

  <?php print $links; ?>
</div>
