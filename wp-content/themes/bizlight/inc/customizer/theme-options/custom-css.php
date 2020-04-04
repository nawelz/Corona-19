<?php
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-custom-css'] = '';
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
    $bizlight_sections['bizlight-custom-css'] =
        array(
            'priority'       => 120,
            'title'          => __( 'Custom CSS', 'bizlight' ),
            'panel'          => 'bizlight-theme-options'
        );

    $bizlight_settings_controls['bizlight-custom-css'] =
        array(
            'setting' =>     array(
                'default'              => $bizlight_customizer_defaults['bizlight-custom-css'],
            ),
            'control' => array(
                'label'                 =>  __( 'Custom CSS', 'bizlight' ),
                'section'               => 'bizlight-custom-css',
                'type'                  => 'textarea',
                'priority'              => 40,
            )
        );
}