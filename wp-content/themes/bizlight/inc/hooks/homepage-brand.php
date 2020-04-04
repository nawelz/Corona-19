<?php

if( !function_exists('bizlight_home_brand') ) :
	/**
     * brand section
     *
     * @since Bizlight 1.0.0
     *
     * @param null
     * @return null
     *
     */

	function bizlight_home_brand(){
		global $bizlight_customizer_all_values;
		$bizlight_home_brand_title = $bizlight_customizer_all_values['bizlight-home-brand-title'];
		$bizlight_home_brand_image1 = $bizlight_customizer_all_values['bizlight-home-brand-image1'];
		$bizlight_home_brand_image2 = $bizlight_customizer_all_values['bizlight-home-brand-image2'];
		$bizlight_home_brand_image3 = $bizlight_customizer_all_values['bizlight-home-brand-image3'];
		$bizlight_home_brand_image4 = $bizlight_customizer_all_values['bizlight-home-brand-image4'];
		$bizlight_home_brand_image5 = $bizlight_customizer_all_values['bizlight-home-brand-image5'];
		?>
		<?php  if( !empty( $bizlight_home_brand_image1 )  ||  !empty( $bizlight_home_brand_image2 ) || !empty( $bizlight_home_brand_image3 )  ||  !empty( $bizlight_home_brand_image4 )  ||  !empty( $bizlight_home_brand_image5 ) ) {  ?>
				<section class="client-section wrapper clearfix">
		            <div class="container">
		            	<h1><?php echo esc_html( $bizlight_home_brand_title ); ?> </h1>
		                <div class="row">
		                    <div class="our-client-sect">
		                        <div class="client-slider"><!-- slider initialization -->
		                        	<?php if( !empty( $bizlight_home_brand_image1 ) ) { ?>
			                            <div class="client-image">
			                                <img class="img-responsive" src="<?php echo esc_url($bizlight_home_brand_image1); ?>" alt="brand-img1">
			                            </div>
		                        	<?php } ?>

		                        	<?php if( !empty( $bizlight_home_brand_image2 ) ) { ?>
			                            <div class="client-image">
			                                <img class="img-responsive" src="<?php echo esc_url($bizlight_home_brand_image2); ?>" alt="brand-img2">
			                            </div>
			                        <?php } ?>    

		                        	<?php if( !empty( $bizlight_home_brand_image3 ) ) { ?>
			                            <div class="client-image">
			                                <img class="img-responsive" src="<?php echo esc_url($bizlight_home_brand_image3); ?>" alt="brand-img3">
			                            </div>
			                        <?php } ?>

		                        	<?php if( !empty( $bizlight_home_brand_image4 ) ) { ?>
			                            <div class="client-image">
			                                <img class="img-responsive" src="<?php echo esc_url($bizlight_home_brand_image4); ?>" alt="brand-img4">
			                            </div>
		                            <?php } ?>

		                        	<?php if( !empty( $bizlight_home_brand_image5 ) ) { ?>
			                            <div class="client-image">
			                                <img class="img-responsive" src="<?php echo esc_url($bizlight_home_brand_image5); ?>" alt="brand-img5">
			                            </div>
		                            <?php } ?>
		                        </div><!-- slider -->
		                    </div><!-- client-sect -->
		                </div><!-- row -->
		            </div><!-- container -->
		        </section><!-- client section -->

		<?php
		}
	}
endif;
add_action( 'homepage', 'bizlight_home_brand', 60 );
