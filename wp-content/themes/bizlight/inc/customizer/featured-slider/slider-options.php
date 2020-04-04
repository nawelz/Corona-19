<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-fs-number']                 = 2;
$bizlight_customizer_defaults['bizlight-fs-slider-mode']            = 'horizontal';
$bizlight_customizer_defaults['bizlight-fs-enable-control']         = 1;
$bizlight_customizer_defaults['bizlight-fs-enable-autoplay']        = 1;
$bizlight_customizer_defaults['bizlight-fs-primary-enable-button']  = 1;
$bizlight_customizer_defaults['bizlight-fs-extra-enable-button']    = 1;
$bizlight_customizer_defaults['bizlight-fs-primary-button-text']    = __( 'Click Start', 'bizlight' );
$bizlight_customizer_defaults['bizlight-fs-button-text']            = __( 'Learn More', 'bizlight' );
$bizlight_customizer_defaults['bizlight-fs-button-url']             = '#';

/*fs options*/
$bizlight_sections['bizlight-fs-slider-options'] =
    array(
        'priority'       => 80,
        'title'          => __( 'Slider Options', 'bizlight' ),
        'panel'          => 'bizlight-featured-slider',
    );

$bizlight_settings_controls['bizlight-fs-number'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-fs-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Slider', 'bizlight' ),
            'section'               => 'bizlight-fs-slider-options',
            'type'                  => 'select',
            'choices'               => array(
                1 => __( '1', 'bizlight' ),
                2 => __( '2', 'bizlight' ),
                3 => __( '3', 'bizlight' ),
                4 => __( '4', 'bizlight' )
            ),
            'priority'              => 30,
            'active_callback'       => ''
        )
    );

$bizlight_settings_controls['bizlight-fs-slider-mode'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-fs-slider-mode']
        ),
        'control' => array(
            'label'                 =>  __( 'Slider Mode', 'bizlight' ),
            'section'               => 'bizlight-fs-slider-options',
            'type'                  => 'select',
            'choices'               => array(
                'scrollHorz' => __( 'horizontal', 'bizlight' ),
                'scrollVert' => __( 'Vertical', 'bizlight' )
            ),
            'priority'              => 40,
            'active_callback'       => ''
        )
    );


$bizlight_settings_controls['bizlight-fs-enable-control'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-fs-enable-control']
        ),
        'control' => array(
            'label'                 =>  __( 'Enabele Slider Arrow', 'bizlight' ),
            'section'               => 'bizlight-fs-slider-options',
            'type'                  => 'checkbox',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );

$bizlight_settings_controls['bizlight-fs-enable-autoplay'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-fs-enable-autoplay']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Autoplay', 'bizlight' ),
            'section'               => 'bizlight-fs-slider-options',
            'type'                  => 'checkbox',
            'priority'              => 60,
            'active_callback'       => ''
        )
    );

$bizlight_settings_controls['bizlight-fs-primary-enable-button'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-fs-primary-enable-button'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Primary Button', 'bizlight' ),
            'section'               => 'bizlight-fs-slider-options',
            'type'                  => 'checkbox',
            'priority'              => 63,
            'active_callback'       => ''
        )
    );

$bizlight_settings_controls['bizlight-fs-primary-button-text'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-fs-primary-button-text'],
        ),
        'control' => array(
            'label'                 =>  __( 'Primary Button Title', 'bizlight' ),
            'section'               => 'bizlight-fs-slider-options',
            'type'                  => 'text',
            'priority'              => 65,
        )
    );



$bizlight_settings_controls['bizlight-fs-extra-enable-button'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-fs-extra-enable-button'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Additional Button', 'bizlight' ),
            'section'               => 'bizlight-fs-slider-options',
            'type'                  => 'checkbox',
            'priority'              => 70,
            'active_callback'       => ''
        )
    );

$bizlight_settings_controls['bizlight-fs-button-text'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-fs-button-text'],
        ),
        'control' => array(
            'label'                 =>  __( 'Additional Button Title', 'bizlight' ),
            'section'               => 'bizlight-fs-slider-options',
            'type'                  => 'text',
            'priority'              => 80,
        )
    );


$bizlight_settings_controls['bizlight-fs-button-url'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-fs-button-url'],
        ),
        'control' => array(
            'label'                 =>  __( 'Additional Button Link', 'bizlight' ),
            'section'               => 'bizlight-fs-slider-options',
            'type'                  => 'text',
            'priority'              => 90,
        )
    );