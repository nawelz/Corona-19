<?php
/**
 * check if all sections of front page disable
 *
 * @since bizlight 1.0.0
 */
if ( ! function_exists( 'bizlight_if_all_disable' ) ) :
    function bizlight_if_all_disable() {
        global $bizlight_customizer_all_values;
        if(
            1 != $bizlight_customizer_all_values['bizlight-home-service-enable'] &&
            1 != $bizlight_customizer_all_values['bizlight-home-about-enable'] &&
            1 != $bizlight_customizer_all_values['bizlight-home-featured-enable'] &&
            1 != $bizlight_customizer_all_values['bizlight-home-blog-enable'] &&
            1 != $bizlight_customizer_all_values['bizlight-home-testimonial-enable']
        )
        {
            return 0;
        }
        else{
            return 1;
        }
    }
endif;
if ( ! function_exists( 'bizlight_front_page' ) ) :
    /**
     * Before main content
     *
     * @since bizlight 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizlight_front_page() {
        if ( 'posts' == get_option( 'show_on_front' ) ) {
            include( get_home_template() );
        }
        elseif( 1 == bizlight_if_all_disable()){
            /**
             * homepage hook
             * @since Bizlight 1.0.0
             *
             * @hooked bizlight_featured_slider -  10
             * @hooked bizlight_homepage_service -  20
             * @hooked bizlight_homepage_about -  30
             * @hooked bizlight_homepage_featured -  40
             * @hooked bizlight_homepage_testimonial -  50
             */
            do_action('homepage');
        }
        else {
            include( get_page_template() );
        }

    }
endif;
add_action( 'bizlight_action_front_page', 'bizlight_front_page', 10 );