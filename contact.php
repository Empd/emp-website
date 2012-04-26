<?php
	
	require_once 'include/scurvy/src/scurvy.php';

	$template = new Scurvy( 'contact.html', 'templates/' );

	$template->set( 'title', 'Extensible Monitoring Platform' );

	echo $template->render();
