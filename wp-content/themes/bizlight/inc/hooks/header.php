<?php
if ( ! function_exists( 'bizlight_set_global' ) ) :
/**
 * Setting global values for all saved customizer values
 *
 * @since Bizlight 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizlight_set_global() {
    /*Getting saved values start*/
    $GLOBALS['bizlight_customizer_all_values'] = bizlight_get_all_options(1);
}
endif;
add_action( 'bizlight_action_before_head', 'bizlight_set_global', 0 );

if ( ! function_exists( 'bizlight_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since Bizlight 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizlight_doctype() {
    ?>
    <!DOCTYPE html><html <?php language_attributes(); ?>>
<?php
}
endif;
add_action( 'bizlight_action_before_head', 'bizlight_doctype', 10 );

if ( ! function_exists( 'bizlight_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since Bizlight 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizlight_before_wp_head() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
}
endif;
add_action( 'bizlight_action_before_wp_head', 'bizlight_before_wp_head', 10 );

if( ! function_exists( 'bizlight_default_layout' ) ) :
    /**
     * Bizlight default layout function
     *
     * @since  Bizlight 1.0.0
     *
     * @param int
     * @return string
     */
    function bizlight_default_layout(){
        global $bizlight_customizer_all_values,$post;
        $bizlight_default_layout = $bizlight_customizer_all_values['bizlight-default-layout'];
        return $bizlight_default_layout;
    }
endif;

if ( ! function_exists( 'bizlight_body_class' ) ) :
/**
 * add body class
 *
 * @since Bizlight 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizlight_body_class( $bizlight_body_classes ) {
    if(!is_front_page() || ( is_front_page() && 1 != bizlight_if_all_disable())){
        $bizlight_default_layout = bizlight_default_layout();
        if( !empty( $bizlight_default_layout ) ){
            if( 'left-sidebar' == $bizlight_default_layout ){
                $bizlight_body_classes[] = 'evision-left-sidebar';
            }
            elseif( 'right-sidebar' == $bizlight_default_layout ){
                $bizlight_body_classes[] = 'evision-right-sidebar';
            }
            elseif( 'no-sidebar' == $bizlight_default_layout ){
                $bizlight_body_classes[] = 'evision-no-sidebar';
            }
            else{
                $bizlight_body_classes[] = 'evision-right-sidebar';
            }
        }
        else{
            $bizlight_body_classes[] = 'bizlight-right-sidebar';
        }
    }
    return $bizlight_body_classes;

}
endif;
add_action( 'body_class', 'bizlight_body_class', 10, 1);

if ( ! function_exists( 'bizlight_page_start' ) ) :
/**
 * page start
 *
 * @since Bizlight 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizlight_page_start() {
?>
    <div id="page" class="hfeed site">
<?php
}
endif;
add_action( 'bizlight_action_before', 'bizlight_page_start', 15 );

if ( ! function_exists( 'bizlight_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since Bizlight 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizlight_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bizlight' ); ?></a>
<?php
}
endif;
add_action( 'bizlight_action_before_header', 'bizlight_skip_to_content', 10 );

if ( ! function_exists( 'bizlight_header' ) ) :
/**
 * Main header
 *
 * @since Bizlight 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bizlight_header() {
    global $bizlight_customizer_all_values;
    ?>
     <!-- header and navigation option second - navigation right  -->
        <header id="masthead" class="site-header evision-nav-right navbar-fixed-top" role="banner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-4 rtl-fright">
                        <?php if ( isset($bizlight_customizer_all_values['bizlight-logo']) && !empty($bizlight_customizer_all_values['bizlight-logo'])) :
                            if ( is_front_page() && is_home() ){
                                echo '<h1 class="site-title">';
                            }
                            else{
                                echo '<p class="site-title">';
                            }
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img class="header-logo" src="<?php echo esc_url($bizlight_customizer_all_values['bizlight-logo']); ?>" alt="<?php bloginfo( 'name' );?>">
                            </a>
                            <?php if ( is_front_page() && is_home() ){
                                echo '</h1>';
                            }
                            else{
                                echo '</p>';
                            }
                        ?>
                        <?php else :
                            if ( is_front_page() && is_home() ){
                                echo '<h1 class="site-title">';
                            }
                            else{
                                echo '<p class="site-title">';
                            }
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php
                                if ( 1 == $bizlight_customizer_all_values['bizlight-enable-title'] ) :
                                    bloginfo( 'name' );
                                endif;
                                ?>
                            </a>
                                <?php
                                if ( 1 == $bizlight_customizer_all_values['bizlight-enable-tagline'] ) :
                                    echo '<p class="site-description">'. get_bloginfo('description' ).'</p>';
                                endif;
                                ?>
                            <?php if ( is_front_page() && is_home() ){
                                echo '</h1>';
                            }
                            else{
                                echo '</p>';
                            }
                        endif; ?>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-8 rtl-fleft">
                        <nav id="site-navigation" class="main-navigation" role="navigation">
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

<?php
}
endif;
add_action( 'bizlight_action_header', 'bizlight_header', 10 );

if( ! function_exists( 'bizlight_main_slider_setion' ) ) :
/**
 * Breadcrumb
 *
 * @since Bizlight 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function bizlight_main_slider_setion(){
        global $post, $wp_query;
        global $bizlight_customizer_all_values;

        // Slider status.
        $featured_slider_status = $bizlight_customizer_all_values['bizlight-fs-enable-on'];

        // Get Page ID outside Loop.
        $page_id = $wp_query->get_queried_object_id();

        // Front page displays in Reading Settings.
        $page_on_front  = absint( get_option( 'page_on_front' ) );
        $page_for_posts = absint( get_option( 'page_for_posts' ) );
        switch ( $featured_slider_status ) {
            case 'entire-site':
                do_action('bizlight_main_slider');
                break;

            case 'front-index-page':
                if (is_front_page()) {
                    do_action('bizlight_main_slider');
                }
                break;

            case 'home-page':
                if ( $page_on_front === $page_id && $page_on_front > 0 ) {
                    do_action('bizlight_main_slider');
                }
                break;

            default:
                break;
        }

    }
endif;
add_action( 'bizlight_action_on_header', 'bizlight_main_slider_setion', 10 );

/*breadcrumb*/
if( ! function_exists( 'bizlight_add_breadcrumb' ) ) :
/**
 * Breadcrumb
 *
 * @since Bizlight 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function bizlight_add_breadcrumb(){
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div id="breadcrumb" class="wrapper wrap-breadcrumb"><div class="container">';
         bizlight_simple_breadcrumb();
        echo '</div><!-- .container --></div><!-- #breadcrumb -->';
        return;
    }
endif;
add_action( 'bizlight_action_after_header', 'bizlight_add_breadcrumb', 10 );


