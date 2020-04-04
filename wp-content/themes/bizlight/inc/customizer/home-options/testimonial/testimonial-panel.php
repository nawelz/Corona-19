<?php
global $bizlight_panels;
/*creating panel for fonts-setting*/
$bizlight_panels['bizlight-home-testimonial'] =
    array(
        'title'          => __( 'Home/Front Testimonial Section', 'bizlight' ),
        'priority'       => 180
    );
/*enable testimonial options */
$bizlight_customizer_enable_testimonial_setting_file_path = bizlight_file_directory('inc/customizer/home-options/testimonial/enable-testimonial.php');
require $bizlight_customizer_enable_testimonial_setting_file_path;

/*testimonial selection from page options */
$bizlight_customizer_testimonial_from_page_file_path = bizlight_file_directory('inc/customizer/home-options/testimonial/from-page.php');
require $bizlight_customizer_testimonial_from_page_file_path;
