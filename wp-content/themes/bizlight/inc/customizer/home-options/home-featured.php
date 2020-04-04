<?php
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-featured-title'] = __( 'WANT TO KNOW MORE ABOUT OUR COMPANY?', 'bizlight' );
$bizlight_customizer_defaults['bizlight-home-featured-button-url'] = esc_url( home_url( '/about-us' ) );
$bizlight_customizer_defaults['bizlight-home-featured-enable'] = 1;
$bizlight_customizer_defaults['bizlight-home-featured-fix-bg-image'] = 1;

$bizlight_sections['bizlight-home-featured'] =
    array(
        'priority'       => 170,
        'title'          => __( 'Home/Front Featured Section', 'bizlight' ),
    );

$bizlight_settings_controls['bizlight-home-featured-title'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-featured-title'],
        ),
        'control' => array(
            'label'                 =>  __( 'Main Title', 'bizlight' ),
            'section'               => 'bizlight-home-featured',
            'type'                  => 'text',
            'priority'              => 10,
        )
    );

$bizlight_settings_controls['bizlight-home-featured-button-url'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-featured-button-url'],
        ),
        'control' => array(
            'label'                 =>  __( 'Learn More Button Link', 'bizlight' ),
            'section'               => 'bizlight-home-featured',
            'type'                  => 'text',
            'priority'              => 40,
        )
    );

$bizlight_settings_controls['bizlight-home-featured-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-featured-enable'],
        ),
        'control' => array(
            'label'                 =>  __( 'Home Featured Enable', 'bizlight' ),
            'section'               => 'bizlight-home-featured',
            'type'                  => 'checkbox',
            'priority'              => 50,
        )
    );

$bizlight_settings_controls['bizlight-home-featured-fix-bg-image'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-featured-fix-bg-image'],
        ),
        'control' => array(
            'label'                 =>  __( 'Fix Image Background', 'bizlight' ),
            'section'               => 'bizlight-home-featured',
            'type'                  => 'checkbox',
            'priority'              => 60,
        )
    );