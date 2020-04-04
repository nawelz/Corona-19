<?php
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-footer-sidebar-number'] = 3;
$bizlight_customizer_defaults['bizlight-copyright-text'] = esc_html__('Copyright &copy; All right reserved','bizlight');
$bizlight_customizer_defaults['bizlight-enable-social-icons'] = '';

$bizlight_customizer_defaults['bizlight-footer-background-color']       = '#3E4444';
$bizlight_customizer_defaults['bizlight-footer-text-color']             = '#fff';

$bizlight_sections['bizlight-footer-options'] = array(
    'priority'       => 60,
    'title'          => esc_html__( 'Footer Options', 'bizlight' ),
    'panel'          => 'bizlight-theme-options'
);


$bizlight_settings_controls['bizlight-copyright-text'] = array(
    'setting' =>     array(
        'default'              => $bizlight_customizer_defaults['bizlight-copyright-text'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Copyright Text', 'bizlight' ),
        'section'               => 'bizlight-footer-options',
        'type'                  => 'text_html',
        'priority'              => 20,
    )
);

$bizlight_settings_controls['bizlight-enable-social-icons'] = array(
    'setting' =>     array(
        'default'              => $bizlight_customizer_defaults['bizlight-enable-social-icons'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Social', 'bizlight' ),
        'description'           =>  esc_html__( 'Please add Social menus for enabling Social menus. Go to Menus for setting up', 'bizlight' ),
        'section'               => 'bizlight-footer-options',
        'type'                  => 'checkbox',
        'priority'              => 30,
    )
);

$bizlight_settings_controls['bizlight-footer-background-color'] = array(
    'setting' =>     array(
        'default'              => $bizlight_customizer_defaults['bizlight-footer-background-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Background Color', 'bizlight' ),
        'section'               => 'bizlight-footer-options',
        'type'                  => 'color',
        'priority'              => 40,
    )
);


$bizlight_settings_controls['bizlight-footer-text-color'] = array(
    'setting' =>     array(
        'default'              => $bizlight_customizer_defaults['bizlight-footer-text-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Text Color', 'bizlight' ),
        'section'               => 'bizlight-footer-options',
        'type'                  => 'color',
        'priority'              => 40,
    )
);