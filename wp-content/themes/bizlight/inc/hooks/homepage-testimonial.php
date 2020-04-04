<?php
if (!function_exists('bizlight_home_testimonial_array')) :
    /**
     * Featured Slider array creation
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return array
     */
    function bizlight_home_testimonial_array(){

        $bizlight_home_testimonial_contents_array = array();
        $bizlight_home_testimonial_contents_array[0]['bizlight-home-testimonial-title'] = __('Sayer Name, CEO','bizlight');
        $bizlight_home_testimonial_contents_array[0]['bizlight-home-testimonial-content'] = __("The set doesn't moved. Deep don't fru it fowl gathering heaven days moving creeping under from i air. Set it fifth Meat was darkness. every bring in it.",'bizlight');
        $bizlight_home_testimonial_contents_array[0]['bizlight-home-testimonial-image'] = '';

        $repeated = array('bizlight-home-testimonial-pages-ids');
        $bizlight_home_testimonial_posts = bizlight_get_repeated_all_value(5, $repeated);
        $bizlight_home_testimonial_posts_ids = array();
        if (null != $bizlight_home_testimonial_posts) {
            foreach ($bizlight_home_testimonial_posts as $bizlight_home_testimonial_post) {
                if (0 != $bizlight_home_testimonial_post['bizlight-home-testimonial-pages-ids']) {
                    $bizlight_home_testimonial_posts_ids[] = $bizlight_home_testimonial_post['bizlight-home-testimonial-pages-ids'];
                }
            }
            if( !empty( $bizlight_home_testimonial_posts_ids )){
                $bizlight_home_testimonial_args = array(
                    'post_type' => 'page',
                    'post__in' => $bizlight_home_testimonial_posts_ids,
                    'posts_per_page' => 5,
                    'orderby' => 'post__in'
                );
            }
        }
        // the query
        if( !empty( $bizlight_home_testimonial_args )){
            $bizlight_home_testimonial_contents_array = array();
            $bizlight_home_testimonial_post_query = new WP_Query($bizlight_home_testimonial_args);
            if ($bizlight_home_testimonial_post_query->have_posts()) :
                $i = 0;
                while ($bizlight_home_testimonial_post_query->have_posts()) : $bizlight_home_testimonial_post_query->the_post();
                $url ='';
                if(has_post_thumbnail()){
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
                    $url = $thumb['0'];
                }
                else{
                  $url = NULL;
                }
                    $bizlight_home_testimonial_contents_array[$i]['bizlight-home-testimonial-title'] = get_the_title();
                    $bizlight_home_testimonial_contents_array[$i]['bizlight-home-testimonial-content'] = bizlight_words_count( 30 ,get_the_content());
                    $bizlight_home_testimonial_contents_array[$i]['bizlight-home-testimonial-image'] = $url;
                    
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $bizlight_home_testimonial_contents_array;
    }
endif;

if (!function_exists('bizlight_home_testimonial')) :
    /**
     * Featured Slider
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizlight_home_testimonial() {
        global $bizlight_customizer_all_values;
        $bizlight_home_testimonial_image_option = $bizlight_customizer_all_values['bizlight-home-testimonial-image-enable'];

        if (1 != $bizlight_customizer_all_values['bizlight-home-testimonial-enable']) {
            return null;
        }
        $bizlight_testimonial_arrays = bizlight_home_testimonial_array();
        if (is_array($bizlight_testimonial_arrays)) {
            ?>
            <section class="evision-wrapper block-section wrap-testimonial">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 evision-animate fadeInDown">
                            <div class="testimonial-icon">
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <div id="carousel-testimonial" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <?php
                                    $i = 0;
                                    foreach( $bizlight_testimonial_arrays as $bizlight_testimonial_array ){
                                        if (5 < $i) {
                                            break;
                                        }
                                        ?>
                                        <li data-target="#carousel-testimonial" data-slide-to="<?php echo absint($i);?>" class="<?php echo $i == 0 ? 'active' : '';?>"></li>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner testimonial-items-wrapper">
                                    <?php
                                    $i = 0;
                                    foreach( $bizlight_testimonial_arrays as $bizlight_testimonial_array ){
                                        if (5 < $i) {
                                            break;
                                        }
                                        ?>

                                        <div class="item <?php echo $i == 0 ? 'active' : '';?>">
                                            <div class="content-text">
                                                <?php if (($bizlight_home_testimonial_image_option == 1) && $bizlight_testimonial_array['bizlight-home-testimonial-image']!= NULL) { ?>
                                                    <div class="content-thumb">
                                                      <span>
                                                            <img src="<?php echo esc_url($bizlight_testimonial_array['bizlight-home-testimonial-image']); ?>">
                                                        </span>
                                                    </div>  
                                                  <?php
                                                  }
                                                    // else {}
                                                        ?>
                                                <p>
                                                    <?php echo wp_kses_post( $bizlight_testimonial_array['bizlight-home-testimonial-content'] ); ?>
                                                </p>
                                            </div>
                                            <div class="testimonial-sayer">
                                                <strong><?php echo esc_html( $bizlight_testimonial_array['bizlight-home-testimonial-title'] ); ?></strong>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- testimonial section -->
        <?php
        }
    }
endif;
add_action('homepage', 'bizlight_home_testimonial', 50);