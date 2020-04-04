<?php
if (!function_exists('bizlight_home_about_array')) :
    /**
     * Featured Slider array creation
     *
     * @since Bizlight 1.0.0
     *
     * @param string $from_about
     * @return array
     */
    function bizlight_home_about_array() {

        $bizlight_home_about_contents_array = array();
        $bizlight_home_about_contents_array[0]['bizlight-home-about-title'] = __('Public Voice','bizlight');
        $bizlight_home_about_contents_array[0]['bizlight-home-about-content'] = __(" The set doesn't moved. Deep don't fru it fowl gathering heaven days moving creeping under from i air. Set it fifth Meat was darkness.",'bizlight');
        $bizlight_home_about_contents_array[0]['bizlight-home-about-link'] = '#';
        $bizlight_home_about_contents_array[0]['bizlight-home-about-icon'] = 'fa-bullhorn';

        $bizlight_home_about_contents_array[1]['bizlight-home-about-title'] = __('Photography','bizlight');
        $bizlight_home_about_contents_array[1]['bizlight-home-about-content'] = __(" The set doesn't moved. Deep don't fru it fowl gathering heaven days moving creeping under from i air. Set it fifth Meat was darkness.",'bizlight');
        $bizlight_home_about_contents_array[1]['bizlight-home-about-link'] = '#';
        $bizlight_home_about_contents_array[1]['bizlight-home-about-icon'] = 'fa-camera-retro';

        $bizlight_home_about_contents_array[2]['bizlight-home-about-title'] = __('Customization','bizlight');
        $bizlight_home_about_contents_array[2]['bizlight-home-about-content'] = __(" The set doesn't moved. Deep don't fru it fowl gathering heaven days moving creeping under from i air. Set it fifth Meat was darkness.",'bizlight');
        $bizlight_home_about_contents_array[2]['bizlight-home-about-link'] = '#';
        $bizlight_home_about_contents_array[2]['bizlight-home-about-icon'] = 'fa-cog';

        $bizlight_icons_arrays = array();
        $bizlight_home_about_args = array();
        $bizlight_repeated_array = array('bizlight-home-about-page-icon','bizlight-home-about-pages-ids');
        $bizlight_home_about_posts = bizlight_get_repeated_all_value(3,$bizlight_repeated_array);
        $bizlight_home_about_posts_ids = array();
        if (null != $bizlight_home_about_posts) {
            foreach ($bizlight_home_about_posts as $bizlight_home_about_post) {
                if (0 != $bizlight_home_about_post['bizlight-home-about-pages-ids']) {
                    $bizlight_home_about_posts_ids[] = $bizlight_home_about_post['bizlight-home-about-pages-ids'];
                    if (isset($bizlight_home_about_post['bizlight-home-about-page-icon'])) {
                        $bizlight_home_about_page_icon = $bizlight_home_about_post['bizlight-home-about-page-icon'];
                    } else {
                        $bizlight_home_about_page_icon = 'fa-desktop';
                    }
                    $bizlight_icons_arrays[] = $bizlight_home_about_page_icon;
                }
            }
            if( !empty( $bizlight_home_about_posts_ids )){
                $bizlight_home_about_args = array(
                    'post_type' => 'page',
                    'post__in' => $bizlight_home_about_posts_ids,
                    'posts_per_page' => 3,
                    'orderby' => 'post__in'
                );
            }
        }
        // the query
        if( !empty( $bizlight_home_about_args )){
            $bizlight_home_about_contents_array = array();
            $bizlight_home_about_post_query = new WP_Query($bizlight_home_about_args);
            if ($bizlight_home_about_post_query->have_posts()) :
                $i = 0;
                while ($bizlight_home_about_post_query->have_posts()) : $bizlight_home_about_post_query->the_post();
                    $bizlight_home_about_contents_array[$i]['bizlight-home-about-title'] = get_the_title();
                    $bizlight_home_about_contents_array[$i]['bizlight-home-about-content'] = bizlight_words_count( 30 ,get_the_content());
                    $bizlight_home_about_contents_array[$i]['bizlight-home-about-link'] = get_permalink();
                    if(isset( $bizlight_icons_arrays[$i] )){
                        $bizlight_home_about_contents_array[$i]['bizlight-home-about-icon'] = $bizlight_icons_arrays[$i];
                    }
                    else{
                        $bizlight_home_about_contents_array[$i]['bizlight-home-about-icon'] = 'fa-desktop';
                    }
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $bizlight_home_about_contents_array;
    }
endif;

if (!function_exists('bizlight_home_about')) :
    /**
     * Featured Slider
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizlight_home_about() {
        global $bizlight_customizer_all_values;
        if (1 != $bizlight_customizer_all_values['bizlight-home-about-enable']) {
            return null;
        }
        $bizlight_about_arrays = bizlight_home_about_array();
        if (is_array($bizlight_about_arrays)) {
            $bizlight_home_about_title = $bizlight_customizer_all_values['bizlight-home-about-title'];
            $bizlight_home_about_content = $bizlight_customizer_all_values['bizlight-home-about-content'];
            $bizlight_home_about_right_image = $bizlight_customizer_all_values['bizlight-home-about-right-image'];
            ?>
            <section class="evision-wrapper block-section wrap-about">
                    <div class="container overhidden">
                        <div class="row">
                            <div class="col-md-7 evision-animate slideInLeft">
                                <div class="about-content">
                                    <h2><?php echo esc_html( $bizlight_home_about_title );?></h2>
                                    <span class="title-divider"></span>
                                    <p class="about-hero-par">
                                        <?php echo wp_kses_post( $bizlight_home_about_content );?>
                                    </p>
                                    <?php
                                    $i = 1;
                                    foreach ($bizlight_about_arrays as $bizlight_about_array) {
                                        if (3 < $i) {
                                            break;
                                        }
                                        ?>
                                            <div class="about-list">
                                                <span class="icon-section">
                                                    <span>
                                                    <i class="fa <?php echo esc_attr( $bizlight_about_array['bizlight-home-about-icon'] ); ?>"></i>
                                                    </span>
                                                </span>

                                                <div class="about-list-content">
                                                    <h3>
                                                        <a href="<?php echo esc_url( $bizlight_about_array['bizlight-home-about-link'] ); ?> ">
                                                            <?php echo esc_attr( $bizlight_about_array['bizlight-home-about-title'] ); ?>
                                                        </a>
                                                    </h3>
                                                    <p>
                                                        <?php echo wp_kses_post( $bizlight_about_array['bizlight-home-about-content'] ); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-5 evision-animate fadeInUp">
                                <div class="product-thumb">
                                    <img src="<?php echo esc_url( $bizlight_home_about_right_image );?>" />
                                </div>
                            </div>
                        </div>
                    </div>
            </section><!-- about section -->
            <?php
        }
        ?>
        <?php
    }
endif;
add_action('homepage', 'bizlight_home_about', 20);