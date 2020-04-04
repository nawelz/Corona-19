<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-about-enable'] = 1;

/*aboutsetting*/
$bizlight_sections['bizlight-home-about-enable-setting'] =
    array(
        'priority'       => 10,
        'title'          => __( 'About Enable Options', 'bizlight' ),
        'panel'          => 'bizlight-home-about',
    );

$bizlight_settings_controls['bizlight-home-about-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-about-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable About', 'bizlight' ),
            'section'               => 'bizlight-home-about-enable-setting',
            'type'                  => 'checkbox',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );