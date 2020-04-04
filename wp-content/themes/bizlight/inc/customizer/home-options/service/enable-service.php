<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-service-enable'] = 1;

/*servicesetting*/
$bizlight_sections['bizlight-home-service-enable-setting'] =
    array(
        'priority'       => 10,
        'title'          => __( 'Service Enable Options', 'bizlight' ),
        'panel'          => 'bizlight-home-service',
    );

$bizlight_settings_controls['bizlight-home-service-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-service-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Service', 'bizlight' ),
            'section'               => 'bizlight-home-service-enable-setting',
            'type'                  => 'checkbox',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );