<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-about-page-icon'] = 'fa-desktop';
$bizlight_customizer_defaults['bizlight-home-about-pages'] = 0;

/*page selection*/
$bizlight_sections['bizlight-home-about-pages'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Select About From Page', 'bizlight' ),
        'panel'          => 'bizlight-home-about',
    );

/*creating setting control for bizlight-home-about-page start*/
$bizlight_repeated_settings_controls['bizlight-home-about-pages'] =
    array(
        'repeated' => 3,
        'bizlight-home-about-page-icon' => array(
            'setting' =>     array(
                'default'              => $bizlight_customizer_defaults['bizlight-home-about-page-icon'],
            ),
            'control' => array(
                'label'                 =>  __( 'Icon %s', 'bizlight' ),
                'section'               => 'bizlight-home-about-pages',
                'type'                  => 'text',
                'priority'              => 5,
                'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s. %2$s See more here %3$s', 'bizlight' ), 'fa-desktop','<a href="'.esc_url('https://fontawesome.com/icons?d=gallery').'" target="_blank">','</a>' ),
            )
        ),
        'bizlight-home-about-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizlight_customizer_defaults['bizlight-home-about-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For About %s', 'bizlight' ),
                'section'               => 'bizlight-home-about-pages',
                'type'                  => 'dropdown-pages',
                'priority'              => 10,
                'description'           => ''
            )
        ),
        'bizlight-home-about-pages-divider' => array(
            'control' => array(
                'section'               => 'bizlight-home-about-pages',
                'type'                  => 'message',
                'priority'              => 20,
                'description'           => '<br /><hr />'
            )
        )
    );