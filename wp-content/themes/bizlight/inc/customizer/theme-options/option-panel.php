<?php
global $bizlight_panels;
/*creating panel for fonts-setting*/
$bizlight_panels['bizlight-theme-options'] =
    array(
        'title'          => __( 'Theme Options', 'bizlight' ),
        'priority'       => 200
    );

/*layout options */
$bizlight_customizer_layout_options_setting_file_path = bizlight_file_directory('inc/customizer/theme-options/layout-options.php');
require $bizlight_customizer_layout_options_setting_file_path;

/*footer options */
$bizlight_customizer_footer_setting_file_path = bizlight_file_directory('inc/customizer/theme-options/footer.php');
require $bizlight_customizer_footer_setting_file_path;

/*custom css options */
$bizlight_customizer_custom_css_setting_file_path = bizlight_file_directory('inc/customizer/theme-options/custom-css.php');
require $bizlight_customizer_custom_css_setting_file_path;