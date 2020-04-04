<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-service-title'] = __('Our Services','bizlight');

/*serviceoptions*/
$bizlight_sections['bizlight-home-service-options'] =
    array(
        'priority'       => 80,
        'title'          => __( 'Service Options', 'bizlight' ),
        'panel'          => 'bizlight-home-service',
    );


$bizlight_settings_controls['bizlight-home-service-title'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-service-title']
        ),
        'control' => array(
            'label'                 =>  __( 'Main Title', 'bizlight' ),
            'section'               => 'bizlight-home-service-options',
            'type'                  => 'text',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );