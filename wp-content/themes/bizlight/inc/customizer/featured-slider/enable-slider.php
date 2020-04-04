<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-fs-enable-on'] = 'front-index-page';
$bizlight_customizer_defaults['bizlight-fs-enable'] = 1;

/*fs setting*/
$bizlight_sections['bizlight-fs-enable-setting'] =
    array(
        'priority'       => 10,
        'title'          => __( 'Enable Slider On', 'bizlight' ),
        'panel'          => 'bizlight-featured-slider',
    );


    $bizlight_settings_controls['bizlight-fs-enable'] =
        array(
            'setting' =>     array(
                'default'              => $bizlight_customizer_defaults['bizlight-fs-enable']
            ),
            'control' => array(
                'label'                 =>  __( 'Enable Slider', 'bizlight' ),
                'section'               => 'bizlight-fs-enable-setting',
                'type'                  => 'checkbox',
                'priority'              => 40,
                'active_callback'       => ''
            )
        );

$bizlight_settings_controls['bizlight-fs-enable-on'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-fs-enable-on']
        ),
        'control' => array(
            'label'                 =>  __( 'Select Enable Slider On', 'bizlight' ),
            'section'               => 'bizlight-fs-enable-setting',
            'type'                  => 'select',
            'choices'               => array(
                'home-page'               => esc_html__( 'Static Front Page Only', 'bizlight' ),
                'front-index-page'        => esc_html__( 'Static Front and Index Page', 'bizlight' ),
                'entire-site'             => esc_html__( 'Entire Site', 'bizlight' ),
            ),
            'priority'              => 50,
            'active_callback'       => ''
        )
    );

