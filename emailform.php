<?php
	require_once 'include/scurvy/src/scurvy.php';

if(isset($_POST['email'])) {
	
	// EDIT THE 2 LINES BELOW AS REQUIRED
	$email_to = "inquiry@emp-d.com";
	$email_subject = "New e-mail subscriber";
	
	
	function died($error) {
		// your error code can go here
		$template = new Scurvy( 'signup.html', 'templates/' );
		$template->set( 'title', 'Extensible Monitoring Platform' );
		$form = "We are very sorry, but there were error(s) found with the form your submitted. ";
		$form.= "These errors appear below.<br /><br />";
		$form.= $error."<br /><br />";
		$template->set( 'form', $form );
		echo $template->render();
		die();
	}
	
	// validation expected data exists
	if(!isset($_POST['email'])) {
		died('We are sorry, but there appears to be a problem with the email your submitted.');		
	}
	
	
	$email_from = $_POST['email']; // required
	
	$error_message = "";
	$email_exp = "^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$";
	  if(!eregi($email_exp,$email_from)) {
	  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
	  }
	
	  if(strlen($error_message) > 0) {
	  	died($error_message);
	  }
	$email_message = "Form details below.\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	
	$email_message .= "Email: ".clean_string($email_from)."\n";

	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

//RENDER VALID VIEW
	$template = new Scurvy( 'signup.html', 'templates/' );
	$template->set( 'title', 'Extensible Monitoring Platform' );
	$form = '<p>Thank you for contacting us. We will be in touch with you as soon as we can!</p>';
	$template->set( 'form', $form );
	echo $template->render();
}else{
header("Location: signup.php");
}
?>