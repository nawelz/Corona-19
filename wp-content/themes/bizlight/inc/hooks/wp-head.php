<?php
if( ! function_exists( 'bizlight_wp_head' ) ) :

    /**
     * Bizlight wp_head hook
     *
     * @since  Bizlight 1.0.0
     */
    function bizlight_wp_head(){
        global $bizlight_customizer_all_values;
        global $bizlight_google_fonts;
        $bizlight_font_family_site_identity     = $bizlight_google_fonts[$bizlight_customizer_all_values['bizlight-font-family-site-identity']];
        $bizlight_font_family_h1_h6             = $bizlight_google_fonts[$bizlight_customizer_all_values['bizlight-font-family-h1-h6']];
        /*Color options */
        $bizlight_h1_h6_color                   = $bizlight_customizer_all_values['bizlight-h1-h6-color'];
        $bizlight_link_color                    = $bizlight_customizer_all_values['bizlight-link-color'];
        $bizlight_link_hover_color              = $bizlight_customizer_all_values['bizlight-link-hover-color'];
        $bizlight_site_identity_color           = $bizlight_customizer_all_values['bizlight-site-identity-color'];
        $bizlight_banner_text_color             = $bizlight_customizer_all_values['bizlight-banner-text-color'];
        $bizlight_footer_bg_color               = $bizlight_customizer_all_values['bizlight-footer-background-color'];
        $bizlight_footer_text_color             = $bizlight_customizer_all_values['bizlight-footer-text-color'];
        $header_image = get_header_image();

        /*footer option*/
        $bizlight_footer_background_color             = $bizlight_customizer_all_values['bizlight-footer-background-color'];
        $bizlight_footer_text_color                  = $bizlight_customizer_all_values['bizlight-footer-text-color'];
        ?>
        <style type="text/css">
            /*site identity font family*/
            .site-title,
            .site-title a,
            .site-description,
            .site-description a{
                font-family: '<?php echo esc_attr( $bizlight_font_family_site_identity ); ?>'!important;
            }
            /*Title font family*/
            h1, h1 a,
            h1.site-title,
            h1.site-title a,
            h2, h2 a,
            h3, h3 a,
            h4, h4 a,
            h5, h5 a,
            h6, h6 a {
                font-family: '<?php echo esc_attr( $bizlight_font_family_h1_h6 ); ?>'!important;
            }
            <?php
            /*Main h1-h6 color*/
            if( !empty($bizlight_h1_h6_color) ){
            ?>
            h1, h1 a,
            h2, h2 a,
            h3, h3 a,
            h4, h4 a,
            h5, h5 a,
            h6, h6 a,
            .box-container .box-inner a:hover{
                color: <?php echo esc_attr( $bizlight_h1_h6_color );?> !important; /*#212121*/
            }
            <?php
            }
          /*Link color*/
            if( !empty($bizlight_link_color) ){
            ?>
            a,
            a > p,
            .posted-on a,
            .cat-links a,
            .tags-links a,
            .author a,
            .comments-link a,
            .edit-link a,
            .nav-links .nav-previous a,
            .nav-links .nav-next a,
            .page-links a {
                color: <?php echo esc_attr( $bizlight_link_color ); ?> !important; /*#212121*/
            }
            <?php
            }

            if( !empty( $bizlight_banner_text_color ) ){
            ?>
            .evision-main-slider .slide-item .main-title a,
            .evision-main-slider .slide-item .banner-con,
            .evision-main-slider .slide-item p{
                color: <?php echo esc_attr( $bizlight_banner_text_color );?>!important;
            }
            .banner-divider-container span{
                background-color: <?php echo esc_attr( $bizlight_banner_text_color );?>!important;
            }
            <?php
            }

            /*Link Hover color*/
              if( !empty($bizlight_link_hover_color) ){
              ?>
              a:hover,
              a:focus,
              a:active,
              a > p:hover,
              a > p:focus,
              a > p:active,
              .posted-on a:hover,
              .cat-links a:focus,
              .tags-links a:active,
              .author a:hover,
              .author a:focus,
              .author a:active,
              .comments-link a:hover,
              .comments-link a:focus,
              .comments-link a:active,
              .edit-link a:hover,
              .edit-link a:focus,
              .edit-link a:active,
              .nav-links .nav-previous a:hover,
              .nav-links .nav-previous a:focus,
              .nav-links .nav-previous a:active,
              .nav-links .nav-next a:hover,
              .nav-links .nav-next a:focus,
              .nav-links .nav-next a:active,
              .page-links a:hover,
              .page-links a:focus,
              .page-links a:active,
              .evision-main-slider .slide-item .main-title a:hover,
              .evision-main-slider .slide-item .main-title a:focus,
              .evision-main-slider .slide-item .main-title a:active{
                  color: <?php echo esc_attr( $bizlight_link_hover_color ); ?> !important; /*#212121*/
              }
              <?php
              }
            /*header menu text*/
            if( !empty( $bizlight_site_identity_color ) ){
            ?>
            .site-title,
            .site-title a,
            .site-description,
            .site-description a{
                color: <?php echo esc_attr( $bizlight_site_identity_color );?>!important;
            }
            <?php
            }

            /*footer bg*/
            if( !empty( $bizlight_footer_bg_color ) ){
            ?>
            .a{
                background-color: <?php echo esc_attr( $bizlight_footer_bg_color );?>!important;
            }
            <?php
            }

            /*footer color*/
            if( !empty( $bizlight_footer_text_color ) ){
            ?>
            .p{
                color: <?php echo esc_attr( $bizlight_footer_text_color );?>!important;
            }
            <?php
            }

            /* inner header image*/
            /* Banner Image*/
            if( !empty( $header_image ) ){
            ?>
                .page-inner-title{
                    background-image: url(<?php echo esc_url($header_image);?>)!important;
                    }
            <?php
            }

            /*footer color*/
            //footer background
            if( !empty( $bizlight_footer_background_color ) ){
            ?>
                .wrap-contact,
                .site-footer{
                    background-color: <?php echo esc_url($bizlight_footer_background_color);?>!important;
                    }
            <?php
            }

            //footer text color
            if( !empty( $bizlight_footer_text_color ) ){
            ?>
                .site-footer, .site-footer p, .wrap-contact, .wrap-contact .widget-title, .wrap-contact, .widgettitle, .wrap-contact ul li, .wrap-contact ul li a, .wrap-contact ul li a:visited,
                .site-info,
                .site-info a,
                .site-info sep{
                  color: <?php echo esc_url($bizlight_footer_text_color);?>!important;
                    }
            <?php
            }

            // Bail if not WP 4.7.
            $bizlight_loop_number = 1;
            if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
              $bizlight_custom_css = $bizlight_customizer_all_values['bizlight-custom-css']; 
              $bizlight_custom_css_output = ''; 
              if ( ! empty( $bizlight_custom_css ) ) { 
                  $bizlight_custom_css_output .= esc_textarea( $bizlight_custom_css ) ; 
              } 
             echo $bizlight_custom_css_output;/*escaping done above*/ 
            } else{
                $bizlight_customizer_saved_values = bizlight_get_all_options();
                $bizlight_custom_css = $bizlight_customizer_all_values['bizlight-custom-css'];
                // Bail if there is no Custom CSS.
                    if (!empty($bizlight_custom_css)) {
                        $core_css = wp_get_custom_css();
                        $return = wp_update_custom_css_post( $core_css . $bizlight_custom_css );
                        if ( ! is_wp_error( $return ) ) {
                        // Remove from theme.
                        $options = esc_textarea($bizlight_customizer_all_values['bizlight-custom-css']);
                        echo $options;
                        }
                    }
                $bizlight_custom_css = '';
                $bizlight_customizer_saved_values['bizlight-custom-css'] = $bizlight_customizer_defaults['bizlight-custom-css'];
                /*resetting fields*/
                bizlight_reset_options( $bizlight_customizer_saved_values );
            }
            ?>
        </style>
    <?php
    }
endif;
add_action( 'wp_head', 'bizlight_wp_head' );
