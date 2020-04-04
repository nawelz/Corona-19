<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-about-title'] = __('WELCOME TO BIZLIGHT','bizlight');
$bizlight_customizer_defaults['bizlight-home-about-content'] = __('About us short description','bizlight');
$bizlight_customizer_defaults['bizlight-home-about-right-image'] = get_template_directory_uri().'/assets/img/product.png';

/*aboutoptions*/
$bizlight_sections['bizlight-home-about-options'] =
    array(
        'priority'       => 80,
        'title'          => __( 'About Options', 'bizlight' ),
        'panel'          => 'bizlight-home-about',
    );


$bizlight_settings_controls['bizlight-home-about-title'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-about-title']
        ),
        'control' => array(
            'label'                 =>  __( 'Main Title', 'bizlight' ),
            'section'               => 'bizlight-home-about-options',
            'type'                  => 'text',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );
$bizlight_settings_controls['bizlight-home-about-content'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-about-content']
        ),
        'control' => array(
            'label'                 =>  __( 'Short Description', 'bizlight' ),
            'section'               => 'bizlight-home-about-options',
            'type'                  => 'textarea_html',
            'priority'              => 25,
            'active_callback'       => ''
        )
    );

$bizlight_settings_controls['bizlight-home-about-right-image'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-about-right-image']
        ),
        'control' => array(
            'label'                 =>  __( 'Right Site Image', 'bizlight' ),
            'description'           =>  __( 'Recommended image size 480 * 540, If you remove image the default image will show', 'bizlight' ),
            'section'               => 'bizlight-home-about-options',
            'type'                  => 'image',
            'priority'              => 35,
            'active_callback'       => ''
        )
    );
