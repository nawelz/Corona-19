<?php
if ( ! function_exists( 'bizlight_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function bizlight_before_footer() {
        global $bizlight_customizer_all_values;
?>
        <!-- *****************************************
             Footer before section
    ****************************************** -->
    <?php 
    if( !is_active_sidebar( 'footer-col-one' ) && !is_active_sidebar( 'footer-col-two' ) && !is_active_sidebar( 'footer-col-three' ) && !is_active_sidebar( 'footer-col-four' )){
        return false;
    }?>
    <section class="evision-wrapper block-section wrap-contact">
        <div class="container overhidden">
            <div class="contact-inner evision-animate fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php if( is_active_sidebar( 'footer-col-one' ) ) : ?>
                                <div class="contact-list col-md-4">
                                    <?php dynamic_sidebar( 'footer-col-one' ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if( is_active_sidebar( 'footer-col-two' )) : ?>
                                <div class="contact-list col-md-4">
                                    <?php dynamic_sidebar( 'footer-col-two' ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if( is_active_sidebar( 'footer-col-three' )) : ?>
                                <div class="contact-list col-md-4">
                                    <?php dynamic_sidebar( 'footer-col-three' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
        <!-- *****************************************
                 Footer before section ends
        ****************************************** -->
    <?php
    }
endif;
add_action( 'bizlight_action_before_footer', 'bizlight_before_footer', 10 );


if ( ! function_exists( 'bizlight_footer' ) ) :
    /**
     * Footer content
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizlight_footer() {
        global $bizlight_customizer_all_values;
        ?>
        <!-- *****************************************
             Footer section starts
    ****************************************** -->
        <footer id="colophon" class="evision-wrapper site-footer" role="contentinfo">
            <?php
            if(  1 == $bizlight_customizer_all_values['bizlight-enable-social-icons']) {
                ?>
                <div class="container footer-social-container">
                    <div class="social-group-nav social-icon-only evision-social-section">
                        <?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'primary-menu' ) ); ?>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="copyright">
                <?php
                if(isset($bizlight_customizer_all_values['bizlight-copyright-text'])){
                    echo wp_kses_post( $bizlight_customizer_all_values['bizlight-copyright-text'] );
                }
                ?>
            </div>
            <div class="site-info">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bizlight' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'bizlight' ), 'WordPress' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'bizlight' ), 'Bizlight', '<a href="http://evisionthemes.com/" rel="designer">eVisionThemes</a>' ); ?>
            </div><!-- .site-info -->

        </footer><!-- #colophon -->
        <!-- *****************************************
                 Footer section ends
        ****************************************** -->
    <?php
    }
endif;
add_action( 'bizlight_action_footer', 'bizlight_footer', 10 );

if ( ! function_exists( 'bizlight_page_end' ) ) :
    /**
     * Page end
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizlight_page_end() {
        ?>
        <a class="evision-back-to-top" href="#page"><i class="fa fa-angle-up"></i></a>
        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'bizlight_action_after', 'bizlight_page_end', 10 );