<?php
global $bizlight_panels;
/*creating panel for fonts-setting*/
$bizlight_panels['bizlight-home-service'] =
    array(
        'title'          => __( 'Home/Front Service Section', 'bizlight' ),
        'priority'       => 160
    );
/*enable service options */
$bizlight_customizer_enable_service_setting_file_path = bizlight_file_directory('inc/customizer/home-options/service/enable-service.php');
require $bizlight_customizer_enable_service_setting_file_path;

/*service selection from page options */
$bizlight_customizer_service_from_page_file_path = bizlight_file_directory('inc/customizer/home-options/service/from-page.php');
require $bizlight_customizer_service_from_page_file_path;

/*service selection from custom options */
$bizlight_customizer_service_options_file_path = bizlight_file_directory('inc/customizer/home-options/service/service-options.php');
require $bizlight_customizer_service_options_file_path;