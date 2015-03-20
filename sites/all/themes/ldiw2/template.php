<?php
function ldiw2_preprocess_page(&$variables) {
	if (isset($variables['node']->type) && $variables['node']->type != '') {
		$variables['template_files'][]='page-node-' . $variables['node']->type;
		}
	}

