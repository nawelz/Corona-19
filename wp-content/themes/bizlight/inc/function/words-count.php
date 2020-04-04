<?php
/**
* Returns word count of the sentences.
*
* @since @since Bizlight 1.0.0
*/
if ( ! function_exists( 'bizlight_words_count' ) ) :
	function bizlight_words_count( $length = 25, $bizlight_content = null ) {
		$bizlight_content = $bizlight_content;
		$bizlight_content = strip_shortcodes( $bizlight_content );
		$bizlight_content = apply_filters('the_content', $bizlight_content);
		$bizlight_content = str_replace(']]&gt;', ']]&gt;', $bizlight_content);

		$excerpt_length = $length;

		$words = preg_split("/[\n\r\t ]+/", $bizlight_content, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
		    array_pop($words);
		    $bizlight_content = implode(' ', $words);
		    $bizlight_content = force_balance_tags( $bizlight_content );          
		    $bizlight_content = $bizlight_content;
		} else {
		    $bizlight_content = implode(' ', $words);
		}

		return $bizlight_content;
	}
endif;