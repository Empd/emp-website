<?php

	require_once 'include/scurvy/src/scurvy.php';
	$template = null;
	
	switch( $_GET['view'] ){
	case "papi": //$template = new Scurvy( 'papi.html', 'templates/' ); break;
	case "iapi": //$template = new Scurvy( 'iapi.html', 'templates/' ); break;
	default:     $template = new Scurvy( 'documentation.html', 'templates/' ); break;
	}
	
	$template->set( 'title', 'Extensible Monitoring Platform' );
	//$template->set( 'subDocList', '<ul><li><a href="documentation.php?view=papi">Plugin API</a></li><li><a href="documentation.php?view=iapi">Interface API</a></li></ul>');

	echo $template->render();
