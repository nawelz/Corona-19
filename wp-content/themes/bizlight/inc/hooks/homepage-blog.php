<?php


if ( ! function_exists( 'bizlight_home_blog' ) ) :
    /**
     * blog Slider
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function bizlight_home_blog() {
        global $bizlight_customizer_all_values;

        $bizlight_home_blog_title = $bizlight_customizer_all_values['bizlight-home-blog-title'];
        $bizlight_home_blog_category = $bizlight_customizer_all_values['bizlight-home-blog-category'];
        $bizlight_bolg_Single_number = $bizlight_customizer_all_values['bizlight-blog-sinle-word'];

        if( 1 != $bizlight_customizer_all_values['bizlight-home-blog-enable'] ){
            return null;
        }
        ?>
        <section class="evision-wrapper block-section wrap-blog">
            <div class="container">
                <h2 class="evision-animate slideInDown"><?php echo esc_html( $bizlight_home_blog_title ); ?></h2>
                <span class="title-divider"></span>
                <div class="row block-row">
                    <div class="row-same-height overhidden">
                        <?php
                        $bizlight_home_about_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'ignore_sticky_posts' => 1,
                            'cat'           => $bizlight_home_blog_category,

                        );
                        $bizlight_home_about_post_query = new WP_Query($bizlight_home_about_args);
                        if ($bizlight_home_about_post_query->have_posts()) :
                            $data_delay = 0;
                            while ($bizlight_home_about_post_query->have_posts()) : $bizlight_home_about_post_query->the_post();
                                if(has_post_thumbnail()){
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'home-blog-post-thumbnails-image' );
                                    $url = $thumb['0'];
                                }
                                else{
                                    $url = get_template_directory_uri().'/assets/img/no-image.jpg';
                                }
                                $data_wow_delay = 'data-wow-delay='.$data_delay.'s';
                                ?>
                                <div class="col-md-4 single-thumb-container evision-animate fadeInUp" <?php echo esc_attr( $data_wow_delay );?>>
                                    <div class="single-thumb-inner">
                                        <div class="single-thumb-image">
                                            <img src="<?php echo esc_url( $url ); ?>" alt="<?php the_title_attribute();?>">
                                            <div class="overlay"></div>
                                            <div class="icon">
                                                <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
                                                    <span><img src="<?php echo esc_url( get_template_directory_uri().'/assets/img/plus-icon.png'); ?>"></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="single-thumb-content">
                                            <h3> <a href="<?php the_permalink(); ?>"><?php the_title();?> </a></h3>
                                            <div class="single-thumb-content-text">
                                                <p>
                                                    <?php echo wp_kses_post(bizlight_words_count($bizlight_bolg_Single_number, get_the_content()) );?>
                                                    
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section> <!-- blog section -->
        <?php
    }
endif;
add_action( 'homepage', 'bizlight_home_blog', 20 );