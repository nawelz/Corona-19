<?php
if ( ! function_exists( 'bizlight_posts_navigation' ) ) :

    /**
     * Posts navigation options
     *
     * @since  Bizlight 1.0.0
     *
     * @param null
     * @return int
     */
    function bizlight_posts_navigation() {
        
        the_posts_navigation();
    }
endif;
add_action( 'bizlight_action_posts_navigation', 'bizlight_posts_navigation' );