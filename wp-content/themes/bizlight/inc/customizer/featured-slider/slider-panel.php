<?php
global $bizlight_panels;
/*creating panel for fonts-setting*/
$bizlight_panels['bizlight-featured-slider'] =
    array(
        'title'          => __( 'Home/Front Featured Slider', 'bizlight' ),
        'priority'       => 150
    );
/*enable slider options */
$bizlight_customizer_enable_slider_setting_file_path = bizlight_file_directory('inc/customizer/featured-slider/enable-slider.php');
require $bizlight_customizer_enable_slider_setting_file_path;

/*slider selection from page options */
$bizlight_customizer_slider_from_page_file_path = bizlight_file_directory('inc/customizer/featured-slider/from-page.php');
require $bizlight_customizer_slider_from_page_file_path;

/*slider selection from custom options */
$bizlight_customizer_slider_options_file_path = bizlight_file_directory('inc/customizer/featured-slider/slider-options.php');
require $bizlight_customizer_slider_options_file_path;