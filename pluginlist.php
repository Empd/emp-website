<?php

	require_once 'include/scurvy/src/scurvy.php';

	$template = new Scurvy( 'pluginlist.html', 'templates/' );

	$template->set( 'title', 'Extensible Monitoring Platform' );

	echo $template->render();
