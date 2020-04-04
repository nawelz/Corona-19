<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-service-page-icon'] = 'fa-desktop';
$bizlight_customizer_defaults['bizlight-home-service-pages'] = 0;

/*page selection*/
$bizlight_sections['bizlight-home-service-pages'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Select Service From Page', 'bizlight' ),
        'panel'          => 'bizlight-home-service',
    );

/*creating setting control for bizlight-home-service-page start*/
$bizlight_repeated_settings_controls['bizlight-home-service-pages'] =
    array(
        'repeated' => 3,
        'bizlight-home-service-page-icon' => array(
            'setting' =>     array(
                'default'              => $bizlight_customizer_defaults['bizlight-home-service-page-icon'],
            ),
            'control' => array(
                'label'                 =>  __( 'Icon %s', 'bizlight' ),
                'section'               => 'bizlight-home-service-pages',
                'type'                  => 'text',
                'priority'              => 5,
                'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s . %2$s See more here %3$s', 'bizlight' ), 'fa-desktop','<a href="'.esc_url('https://fontawesome.com/icons?d=gallery').'" target="_blank">','</a>' ),
            )
        ),
        'bizlight-home-service-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizlight_customizer_defaults['bizlight-home-service-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Service %s', 'bizlight' ),
                'section'               => 'bizlight-home-service-pages',
                'type'                  => 'dropdown-pages',
                'priority'              => 10,
                'description'           => ''
            )
        ),
        'bizlight-home-service-pages-divider' => array(
            'control' => array(
                'section'               => 'bizlight-home-service-pages',
                'type'                  => 'message',
                'priority'              => 20,
                'description'           => '<br /><hr />'
            )
        )
    );