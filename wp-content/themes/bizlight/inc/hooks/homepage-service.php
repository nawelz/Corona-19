<?php
if ( ! function_exists( 'bizlight_home_service_array' ) ) :
    /**
     * Featured Slider array creation
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return array
     */
    function bizlight_home_service_array(  ){

        $bizlight_home_service_contents_array = array();

        $bizlight_home_service_contents_array[0]['bizlight-home-service-title'] = __('LOVELY DESIGN', 'bizlight');
        $bizlight_home_service_contents_array[0]['bizlight-home-service-content'] = __("The set doesn't moved. Deep don't fru it fowl gathering heaven days moving creeping under from i air. Set it fifth Meat was darkness. every bring in it.", 'bizlight');
        $bizlight_home_service_contents_array[0]['bizlight-home-service-link'] = '#';
        $bizlight_home_service_contents_array[0]['bizlight-home-service-icon'] = 'fa-desktop';

        $bizlight_home_service_contents_array[1]['bizlight-home-service-title'] = __('STYLIES PHOTOGRAPY', 'bizlight');
        $bizlight_home_service_contents_array[1]['bizlight-home-service-content'] = __("The set doesn't moved. Deep don't fru it fowl gathering heaven days moving creeping under from i air. Set it fifth Meat was darkness. every bring in it.", 'bizlight');
        $bizlight_home_service_contents_array[1]['bizlight-home-service-link'] = '#';
        $bizlight_home_service_contents_array[1]['bizlight-home-service-icon'] = 'fa-camera-retro';

        $bizlight_home_service_contents_array[2]['bizlight-home-service-title'] = __('CREATIVE AGENCY', 'bizlight');
        $bizlight_home_service_contents_array[2]['bizlight-home-service-content'] = __("The set doesn't moved. Deep don't fru it fowl gathering heaven days moving creeping under from i air. Set it fifth Meat was darkness. every bring in it.", 'bizlight');
        $bizlight_home_service_contents_array[2]['bizlight-home-service-link'] = '#';
        $bizlight_home_service_contents_array[2]['bizlight-home-service-icon'] = 'fa-rocket';

        $bizlight_icons_arrays = array();
        $bizlight_home_service_args = array();

        $repeated = array('bizlight-home-service-page-icon','bizlight-home-service-pages-ids');

        $bizlight_home_service_posts = bizlight_get_repeated_all_value(3, $repeated);
        $bizlight_home_service_posts_ids = array();
        if( null != $bizlight_home_service_posts ) {
            foreach( $bizlight_home_service_posts as $bizlight_home_service_post ) {
                if( isset($bizlight_home_service_post['bizlight-home-service-pages-ids']) && 0 != $bizlight_home_service_post['bizlight-home-service-pages-ids'] ){
                    $bizlight_home_service_posts_ids[] = $bizlight_home_service_post['bizlight-home-service-pages-ids'];
                    if( isset( $bizlight_home_service_post['bizlight-home-service-page-icon'] )){
                        $bizlight_home_service_page_icon = $bizlight_home_service_post['bizlight-home-service-page-icon'];
                    }
                    else{
                        $bizlight_home_service_page_icon =' fa-desktop';
                    }
                    $bizlight_icons_arrays[] = $bizlight_home_service_page_icon;
                }
            }
            if( !empty( $bizlight_home_service_posts_ids )){
                $bizlight_home_service_args =    array(
                    'post_type' => 'page',
                    'post__in' => $bizlight_home_service_posts_ids,
                    'posts_per_page' => 3,
                    'orderby' => 'post__in'
                );
            }
        }
        // the query
        if( !empty( $bizlight_home_service_args )){
            $bizlight_home_service_contents_array = array(); /*again empty array*/
            $bizlight_home_service_post_query = new WP_Query( $bizlight_home_service_args );
            if ( $bizlight_home_service_post_query->have_posts() ) :
                $i = 0;
                while ( $bizlight_home_service_post_query->have_posts() ) : $bizlight_home_service_post_query->the_post();
                    $bizlight_home_service_contents_array[$i]['bizlight-home-service-title'] = get_the_title();
                    $bizlight_home_service_contents_array[$i]['bizlight-home-service-content'] = bizlight_words_count( 30 ,get_the_content());
                    $bizlight_home_service_contents_array[$i]['bizlight-home-service-link'] = get_permalink();
                    if(isset( $bizlight_icons_arrays[$i] )){
                        $bizlight_home_service_contents_array[$i]['bizlight-home-service-icon'] = $bizlight_icons_arrays[$i];
                    }
                    else{
                        $bizlight_home_service_contents_array[$i]['bizlight-home-service-icon'] = 'fa-desktop';
                    }
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $bizlight_home_service_contents_array;
    }
endif;

if ( ! function_exists( 'bizlight_home_service' ) ) :
    /**
     * Featured Slider
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizlight_home_service() {
        global $bizlight_customizer_all_values;
        if( 1 != $bizlight_customizer_all_values['bizlight-home-service-enable'] ){
            return null;
        }
        $bizlight_service_arrays = bizlight_home_service_array(  );
        if( is_array( $bizlight_service_arrays )){
            $bizlight_home_service_title = $bizlight_customizer_all_values['bizlight-home-service-title'];
            ?>
            <section class="evision-wrapper block-section wrap-service">
                <div class="container">
            <?php if(!empty( $bizlight_home_service_title ) ){
                ?>
                <h2 class="evision-animate slideInDown"><?php echo esc_html( $bizlight_home_service_title );?></h2>
                <span class="title-divider"></span>
                <?php
            }?>
                    <div class="row block-row overhidden">
                        <?php
                        $i = 1;
                        $data_delay = 0;
                        foreach( $bizlight_service_arrays as $bizlight_service_array ){
                            if( 3 < $i){
                                break;
                            }
                            $data_wow_delay = 'data-wow-delay='.$data_delay.'s';
                            ?>
                            <div class="col-md-4 box-container evision-animate fadeInUp" <?php echo esc_attr( $data_wow_delay );?>>
                                <div class="box-inner">
                                    <a href="<?php echo esc_url( $bizlight_service_array['bizlight-home-service-link'] );?>" title="<?php echo esc_attr( $bizlight_service_array['bizlight-home-service-title'] ); ?>">
                                        <div class="icon-container">
                                            <span><i class="fa <?php echo esc_attr( $bizlight_service_array['bizlight-home-service-icon'] ); ?>"></i></span>
                                        </div>
                                        <div class="box-content">
                                            <h3><?php echo esc_html( $bizlight_service_array['bizlight-home-service-title'] );?></h3>
                                            <div class="box-content-text">
                                                <p>
                                                    <?php echo wp_kses_post( $bizlight_service_array['bizlight-home-service-content'] );?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </section><!-- service section -->
            <?php
        }
        ?>
        <?php
    }
endif;
add_action( 'homepage', 'bizlight_home_service', 20 );