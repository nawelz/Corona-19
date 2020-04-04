<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*creating panel for fonts-setting*/
$bizlight_panels['bizlight-fonts'] =
    array(
        'title'          => __( 'Font Setting', 'bizlight' ),
        'priority'       => 43
    );

/*font array*/
global $bizlight_google_fonts;
$bizlight_google_fonts = array(
    'Raleway:400,300,500,600,700,900' => 'Raleway',
    'Inconsolata:400,700' => 'Inconsolata',
    'Yanone+Kaffeesatz:400,400italic,600,700' => 'Yanone Kaffeesatz',
    'Francois+One:400,400italic,600,700' => 'Francois One',
    'Architects+Daughter:400' => 'Architects Daughter',
    'Crete+Round:400' => 'Crete Round',
    'Lobster+Two:400,700' => 'Lobster Two',
    'Varela:400' => 'Varela',
    'Boogaloo:400' => 'Boogaloo',
    'Patrick+Hand:400' => 'Patrick Hand',
    'Homenaje:400' => 'Homenaje'
);

/*defaults values*/
$bizlight_customizer_defaults['bizlight-font-family-site-identity'] = 'Raleway:400,300,500,600,700,900';
$bizlight_customizer_defaults['bizlight-font-family-h1-h6'] = 'Raleway:400,300,500,600,700,900';


/*section*/
$bizlight_sections['bizlight-family'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Font Family', 'bizlight' ),
        'panel'          => 'bizlight-fonts',
    );

/*setting - controls*/
$bizlight_settings_controls['bizlight-font-family-site-identity'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-font-family-site-identity'],
        ),
        'control' => array(
            'label'                 => __( 'Site Identity Font Family', 'bizlight' ),
            'description'           => __( 'Site title and tagline font family', 'bizlight' ),
            'section'               => 'bizlight-family',
            'type'                  => 'select',
            'choices'               => $bizlight_google_fonts,
            'priority'              => 2,
            'active_callback'       => ''
        )
    );

$bizlight_settings_controls['bizlight-font-family-h1-h6'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-font-family-h1-h6'],
        ),
        'control' => array(
            'label'                 => __( 'H1-H6 Font Family', 'bizlight' ),
            'section'               => 'bizlight-family',
            'type'                  => 'select',
            'choices'               => $bizlight_google_fonts,
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

