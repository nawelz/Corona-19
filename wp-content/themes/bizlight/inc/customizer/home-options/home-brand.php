<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-brand-title'] = esc_html__('CLIENT BRAND','bizlight');
$bizlight_customizer_defaults['bizlight-home-brand-image1'] = '';
$bizlight_customizer_defaults['bizlight-home-brand-image2'] = '';
$bizlight_customizer_defaults['bizlight-home-brand-image3'] = '';
$bizlight_customizer_defaults['bizlight-home-brand-image4'] = '';
$bizlight_customizer_defaults['bizlight-home-brand-image5'] = '';

/*Brand options*/
$bizlight_sections['bizlight-home-brand-options'] = array(
    'priority'       => 172,
    'title'          => esc_html__( 'Home/Front Brand Options', 'bizlight' ),
);

$bizlight_settings_controls['bizlight-home-brand-title'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-brand-title']
        ),
        'control' => array(
            'label'                 =>  __( 'Main Title', 'bizlight' ),
            'section'               => 'bizlight-home-brand-options',
            'type'                  => 'text',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

//image 1
$bizlight_settings_controls['bizlight-home-brand-image1'] = array(
    'setting' =>     array(
        'default'              => $bizlight_customizer_defaults['bizlight-home-brand-image1'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Image First', 'bizlight' ),
        'section'               => 'bizlight-home-brand-options',
        'type'                  => 'image',
        'priority'              => 20,
    )
);

//image 2
$bizlight_settings_controls['bizlight-home-brand-image2'] = array(
    'setting' =>     array(
        'default'              => $bizlight_customizer_defaults['bizlight-home-brand-image2'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Image Second', 'bizlight' ),
        'section'               => 'bizlight-home-brand-options',
        'type'                  => 'image',
        'priority'              => 30,
    )
);

//image 3
$bizlight_settings_controls['bizlight-home-brand-image3'] = array(
    'setting' =>     array(
        'default'              => $bizlight_customizer_defaults['bizlight-home-brand-image3'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Image Third', 'bizlight' ),
        'section'               => 'bizlight-home-brand-options',
        'type'                  => 'image',
        'priority'              => 40,
    )
);


//image 4
$bizlight_settings_controls['bizlight-home-brand-image4'] = array(
    'setting' =>     array(
        'default'              => $bizlight_customizer_defaults['bizlight-home-brand-image4'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Image Fourth', 'bizlight' ),
        'section'               => 'bizlight-home-brand-options',
        'type'                  => 'image',
        'priority'              => 50,
    )
);



//image 5
$bizlight_settings_controls['bizlight-home-brand-image5'] = array(
    'setting' =>     array(
        'default'              => $bizlight_customizer_defaults['bizlight-home-brand-image5'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Image Fifth', 'bizlight' ),
        'section'               => 'bizlight-home-brand-options',
        'type'                  => 'image',
        'priority'              => 60,
    )
);

