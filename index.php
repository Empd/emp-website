<?php
	$MAX_POSTS = 5;
	require_once 'include/scurvy/src/scurvy.php';

	$template = new Scurvy( 'index.html', 'templates/' );

	$template->set( 'title', 'Extensible Monitoring Platform' );

	$posts = "";
	$pcount=0;
	$xml = simplexml_load_file("blog.xml");
	foreach($xml->children() as $post)
	{
	  if($pcount>$MAX_POSTS){ break; }
	  
	  $posts.='<div class="content"><div class="post">';
	  foreach($post->children() as $child)
	  {
	     if($child->getName() == "title"){
	     	$posts.='<h2>'.$child.'</h2>';
	     }
	     else if($child->getName() == "date"){
	     	$posts.='<h4>'.date("F j, Y, g:i a", (int)$child).'</h4>';
	     }
	     else if($child->getName() == "content"){
	        // trims the <content> tags but maintains actual content.
	     	$posts.= substr($child->asXML(),9,-10);
	     }
	  }
	  $posts.='</div></div>';
	  
	  $pcount++;
  	}

	$template->set( 'posts', $posts );

	echo $template->render();
