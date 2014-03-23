<?php

// Create our custom Publicize message
function jetpack_enhancements_publicize_custom_message() {
	$post = get_post();

	/** If the post being publicized is an aside, let's use the entire aside as
	    the Custom Message instead of just the title, if it will fit on Twitter. */
	if ( 'aside' == get_post_format( $post->ID ) ) {
		$custom_message = apply_filters('the_content', $post->post_content);
		$custom_message = strip_tags( $custom_message );
		$custom_message = trim( $custom_message );
		if ( strlen( $custom_message ) <= 100 ) { // This should be 116 but Publicize acts weird
			update_post_meta( $post->ID, '_wpas_mess', $custom_message );
		}
	}
}

// Save that message
function jetpack_enhancements_publicize_custom_message_save() {
	add_action( 'save_post', 'jetpack_enhancements_publicize_custom_message', 21 );
}
add_action( 'publish_post', 'jetpack_enhancements_publicize_custom_message_save' );