<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-service-selection'] = 'from-page';

/*servicesetting*/
$bizlight_sections['bizlight-home-service-selection-setting'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Service Selection Options', 'bizlight' ),
        'panel'          => 'bizlight-home-service',
    );

$bizlight_settings_controls['bizlight-home-service-selection'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-service-selection']
        ),
        'control' => array(
            'label'                 =>  __( 'Select Service From', 'bizlight' ),
            'description'           =>  __( 'After selecting one of the option, please go back and go to particular section to add', 'bizlight' ),
            'section'               => 'bizlight-home-service-selection-setting',
            'type'                  => 'select',
            'choices'               => array(
                'from-page' => __( 'Page', 'bizlight' ),
                'from-category' => __( 'Category', 'bizlight' ),
                'from-custom' => __( 'Custom', 'bizlight' )
            ),
            'priority'              => 20,
            'active_callback'       => ''
        )
    );