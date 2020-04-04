<?php
/**
 * Implement Editor Styles
 *
 * @since Bizlight 1.0.0.5
 *
 * @param null
 * @return null
 *
 */
add_action( 'init', 'bizlight_add_editor_styles' );

if ( ! function_exists( 'bizlight_add_editor_styles' ) ) :
    function bizlight_add_editor_styles() {
        add_editor_style( 'editor-style.css' );
    }
endif;