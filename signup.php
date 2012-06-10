<?php

	require_once 'include/scurvy/src/scurvy.php';

	$template = new Scurvy( 'signup.html', 'templates/' );

	$template->set( 'title', 'Extensible Monitoring Platform' );
	
	$form = '<form method="post" id="subscribeform" action="emailform.php">
		            <div id="email_input">
		                <input name="email" type="text" size="30" value="Enter Your E-mail" onfocus="if(this.value==\'Enter Your E-mail\'){this.value=\'\'};" onblur="if(this.value==\'\'){this.value=\'Enter Your E-mail\'};" id="email" /> 
		                <input type="submit" id="submit" value="SUBMIT" />
		            </div>
		        </form>';
	
	$template->set( 'form', $form );

	echo $template->render();
