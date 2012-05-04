$(document).ready(function() {
	blitText( 'heading', 'EMP' );
});

blitText = function( id, text, callback, blit_speed, blink ) {
	blit_speed = typeof blit_speed !== 'undefined' ? blit_speed : 100;
	blink = typeof blink !== 'undefined' ? blink : true;

	var i = 0;
	var blink_speed = 500;
	var blink_time = 0;
	
	blit = function() {
		$('#' + id).text( text.substring( 0, ++i )+'_' );
		if ( i < text.length )
			setTimeout( 'blit()', blit_speed );
		else 
			if ( typeof callback !== 'undefined' ) {
				callback( id, text );
			}
	}
	
	blinkCursor = function() {
		var t = $('#' + id).text();
		
		blink_time += blink_speed;
		
		if ( t.charAt( t.length - 1 ) == '_' ) {
			$('#' + id).text( t.substring( 0, t.length - 1 ) );
		} else {
			$('#' + id).text( t + '_' );
		}
		
		if ( blink_time < 3500 + blink_speed )
			setTimeout( 'blinkCursor()', blink_speed );
	}
	
	// Blit the text
	blit();
	
	// If the cursor should blink, start blinking
	if (blink) blinkCursor();
}
