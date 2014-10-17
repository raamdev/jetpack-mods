<?php

// Create our custom Publicize message
function jetpack_mods_publicize_custom_message( $post_ID ) {
	$post = get_post( $post_ID );

	/** If the post being publicized is an Aside, let's use the entire content as
	    the Custom Message instead of just the title, if it will fit on Twitter. */
	if ( 'aside' === get_post_format( $post->ID ) ) {
		$custom_message = apply_filters('the_content', $post->post_content);
		$custom_message = strip_tags( $custom_message );
		$custom_message = trim( $custom_message );

		if ( strlen( $custom_message ) <= 116 ) {
			update_post_meta( $post->ID, '_wpas_mess', $custom_message );
		}
	}

	/** If the post being publicized is a Quote, let's use the entire content as
	the Custom Message instead of just the title, if it will fit on Twitter. */
	if ( 'quote' === get_post_format( $post->ID ) ) {
		$custom_message = apply_filters('the_content', $post->post_content);

		/* If our quote has <cite> tags AND it doesn't contain any double-quotes THEN
		   let's wrap the quote itself in double-quotes for better presentation on Twitter. */
		if (preg_match('/<cite>/', $custom_message) && strpos(strip_tags($custom_message), '"') === FALSE) {

			$cite_start_pos = stripos($custom_message, '<cite>');
			$quote = substr($custom_message, 0, $cite_start_pos); // Extract quote without <cite>
			$cite = substr($custom_message, $cite_start_pos); // Extract everything after, and including, <cite>

			// Handle quotes that start with <blockquote>
			if(stripos($custom_message, '<blockquote>') === 0) {
				$quote = strip_tags( $quote );
				$quote = '<blockquote>"' . trim( $quote ) . '"';
			} else {
				$quote = strip_tags($quote);
				$quote = '"' . trim($quote) . '"';
			}

			// Combine to make updated custom message
			$custom_message = $quote . ' ' . $cite;
		}

		$custom_message = strip_tags( $custom_message );
		$custom_message = trim( $custom_message );

		if ( strlen( $custom_message ) <= 116 ) {
			update_post_meta( $post->ID, '_wpas_mess', $custom_message );
		}
	}
}

// Save that message
function jetpack_mods_publicize_custom_message_save() {
	add_action( 'save_post', 'jetpack_mods_publicize_custom_message', 21 );
}

add_action( 'xmlrpc_publish_post', 'jetpack_mods_publicize_custom_message_save' );
add_action( 'publish_post', 'jetpack_mods_publicize_custom_message_save' );