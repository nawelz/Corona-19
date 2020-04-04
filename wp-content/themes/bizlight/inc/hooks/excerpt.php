<?php
if( ! function_exists( 'bizlight_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  Bizlight 1.0.0
     *
     * @param null
     * @return int
     */
    function bizlight_excerpt_length( ){
        return esc_attr( 30 );
    }

endif;
add_filter( 'excerpt_length', 'bizlight_excerpt_length', 999 );