<?php
if ( ! function_exists( 'bizlight_featured_slider_array' ) ) :
    /**
     * Featured Slider array creation
     *
     * @since Bizlight 1.0.0
     *
     * @param string $from_slider
     * @return array
     */
    function bizlight_featured_slider_array( ){
        global $bizlight_customizer_all_values;
        $bizlight_feature_slider_number = absint( $bizlight_customizer_all_values['bizlight-fs-number'] );

        $bizlight_fs_contents_array[0]['bizlight-fs-title'] = __('Welcome to bizlight','bizlight');
        $bizlight_fs_contents_array[0]['bizlight-fs-content'] = __('Unlike other companies, we do not charge hundreds of dollars per theme.','bizlight');
        $bizlight_fs_contents_array[0]['bizlight-fs-link'] = '#';
        $bizlight_fs_contents_array[0]['bizlight-fs-image'] = get_template_directory_uri()."/assets/img/slider.jpg";

        $bizlight_fs_contents_array[1]['bizlight-fs-title'] = __('The Way We Create','bizlight');
        $bizlight_fs_contents_array[1]['bizlight-fs-content'] = __('Unlike other companies, we do not charge hundreds of dollars per theme.','bizlight');
        $bizlight_fs_contents_array[1]['bizlight-fs-link'] = '#';
        $bizlight_fs_contents_array[1]['bizlight-fs-image'] = get_template_directory_uri()."/assets/img/slider2.jpg";

        $bizlight_fs_args = array();
        $repeated = array('bizlight-fs-pages-ids');
        $bizlight_fs_posts = bizlight_get_repeated_all_value( 4 ,$repeated);
        $bizlight_fs_posts_ids = array();
        if( null != $bizlight_fs_posts ) {
            foreach( $bizlight_fs_posts as $bizlight_fs_post ) {
                if( 0 != $bizlight_fs_post['bizlight-fs-pages-ids'] ){
                    $bizlight_fs_posts_ids[] = $bizlight_fs_post['bizlight-fs-pages-ids'];
                }
            }
            if( !empty( $bizlight_fs_posts_ids )){
                $bizlight_fs_args =    array(
                    'post_type' => 'page',
                    'post__in' => $bizlight_fs_posts_ids,
                    'posts_per_page' => $bizlight_feature_slider_number,
                    'orderby' => 'post__in'
                );
            }

        }
        if( !empty( $bizlight_fs_args )){
            // the query
            $bizlight_fs_post_query = new WP_Query( $bizlight_fs_args );
            if ( $bizlight_fs_post_query->have_posts() ) :
                $i = 0;
                while ( $bizlight_fs_post_query->have_posts() ) : $bizlight_fs_post_query->the_post();
                    $url ='';
                    if(has_post_thumbnail()){
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'home-main-slider' );
                        $url = $thumb['0'];
                    }
                    $bizlight_fs_contents_array[$i]['bizlight-fs-title'] = get_the_title();
                    $bizlight_fs_contents_array[$i]['bizlight-fs-content'] = bizlight_words_count( 20 ,get_the_content());;
                    $bizlight_fs_contents_array[$i]['bizlight-fs-link'] = get_permalink();
                    $bizlight_fs_contents_array[$i]['bizlight-fs-image'] = $url;
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $bizlight_fs_contents_array;
    }
endif;

if ( ! function_exists( 'bizlight_featured_slider' ) ) :
    /**
     * Featured Slider
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizlight_featured_slider() {
        global $bizlight_customizer_all_values;

        if( 1 != $bizlight_customizer_all_values['bizlight-fs-enable'] ){
            return null;
        }
        $bizlight_slider_arrays = bizlight_featured_slider_array();
        if( is_array( $bizlight_slider_arrays )){
        $bizlight_feature_slider_number = absint( $bizlight_customizer_all_values['bizlight-fs-number'] );
        $bizlight_feature_slider_mode = $bizlight_customizer_all_values['bizlight-fs-slider-mode'];
        $bizlight_fs_enable_control = $bizlight_customizer_all_values['bizlight-fs-enable-control'];
        $bizlight_fs_enable_autoplay = $bizlight_customizer_all_values['bizlight-fs-enable-autoplay'];
        $bizlight_home_added_button_text = $bizlight_customizer_all_values['bizlight-fs-button-text'];

        $bizlight_home_added_button_url = $bizlight_customizer_all_values['bizlight-fs-button-url'];
        $bizlight_enable_extra_button  = $bizlight_customizer_all_values['bizlight-fs-extra-enable-button'];
        $bizlight_enable_primary_button  = $bizlight_customizer_all_values['bizlight-fs-primary-enable-button'];
        $bizlight_primary_button_text  = $bizlight_customizer_all_values['bizlight-fs-primary-button-text'];

        ?>
        <section class="evision-wrapper evision-wrap-banner evision-banner-right-nav">
            <?php if( 1 == $bizlight_fs_enable_control){ ?>
                <div class="controls">
                    <a href="#" id="bizlight-prev"><i class="fa fa-angle-left"></i></a> 
                    <a href="#" id="bizlight-next"><i class="fa fa-angle-right"></i></a>
                </div>
            <?php }  ?>

            <div class="evision-main-slider">
                <div class="cycle-slideshow"
                data-cycle-swipe=true
                data-cycle-swipe-fx=scrollHorz
                data-cycle-fx=<?php echo esc_attr( $bizlight_feature_slider_mode);?>
                data-cycle-speed=1500
                data-cycle-carousel-fluid=true
                data-cycle-carousel-visible=1
                data-cycle-pause-on-hover="true"
                data-cycle-auto-height=container
                data-cycle-carousel-fluid=true
                data-cycle-slides="> div"
                data-cycle-prev="#bizlight-prev"
                data-cycle-next="#bizlight-next"
                <?php if( 1 == $bizlight_fs_enable_control){ ?>
                    data-cycle-pager="#bizlight-pager"
                <?php }  ?>
                <?php if( 1 != $bizlight_fs_enable_autoplay){ ?>
                    data-cycle-timeout=0
                <?php }  ?>
                <?php if(1 == $bizlight_fs_enable_autoplay){ ?>
                    data-cycle-timeout=4000
                <?php }  ?>
                >
                    <?php
                    $i = 1;
                    foreach( $bizlight_slider_arrays as $bizlight_slider_array ){
                        if( $bizlight_feature_slider_number < $i){
                            break;
                        }
                        if(empty($bizlight_slider_array['bizlight-fs-image'])){
                            $bizlight_feature_slider_image = get_template_directory_uri().'/assets/img/no-image-1260_530.png';
                        }
                        else{
                            $bizlight_feature_slider_image =$bizlight_slider_array['bizlight-fs-image'];
                        }
                        $bizlight_container_link = $bizlight_slider_array['bizlight-fs-link'];
                        ?>
                        <div class="slide-item">
                            <div class="container-fluid" style="background-image: url('<?php echo esc_url( $bizlight_feature_slider_image )?>');">
                                <div class="thumb-overlay">
                                    <div class="container evision-slider-content overhidden">
                                        <div class="row">
                                            <div class="col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2 banner-content">
                                                <div class="evision-slider-caption evision-animate fadeInUp">
                                                    <h1 class="main-title">
                                                        <a href="<?php echo esc_url( $bizlight_slider_array['bizlight-fs-link'] ); ?>">
                                                            <?php echo esc_html( $bizlight_slider_array['bizlight-fs-title'] ); ?>
                                                        </a>
                                                    </h1>
                                                    <div class="banner-divider-container">
                                                        <span class="banner-divider"></span>
                                                    </div>
                                                    <div class="banner-con">
                                                        <p>
                                                            <?php echo wp_kses_post( $bizlight_slider_array['bizlight-fs-content'] ); ?>
                                                        </p>
                                                    </div>
                                                    <a class="banner-btn button" href="<?php echo esc_url( $bizlight_slider_array['bizlight-fs-link'] ); ?>">
                                                        <?php echo esc_html($bizlight_primary_button_text); ?>
                                                    </a>
                                                    <?php
                                                    if( 1 == $bizlight_enable_extra_button ){
                                                        ?>
                                                            <a class="banner-btn button" href="<?php echo esc_url( $bizlight_home_added_button_url); ?>">
                                                                <?php echo esc_html($bizlight_home_added_button_text);?>
                                                            </a>
                                                        <?php
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    $i++;
                    }
                    ?>
                </div>
            </div>
            <div class="cycle-pager" id="bizlight-pager"></div>
        </section>
    <?php
    }
}
endif;
add_action( 'bizlight_main_slider', 'bizlight_featured_slider', 10 );