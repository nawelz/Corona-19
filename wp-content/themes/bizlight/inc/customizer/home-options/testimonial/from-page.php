<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-testimonial-pages'] = 0;

/*page selection*/
$bizlight_sections['bizlight-home-testimonial-pages'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Select Testimonial From Page', 'bizlight' ),
        'panel'          => 'bizlight-home-testimonial',
    );

/*creating setting control for bizlight-home-testimonial-page start*/
$bizlight_repeated_settings_controls['bizlight-home-testimonial-pages'] =
    array(
        'repeated' => 5,
        'bizlight-home-testimonial-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizlight_customizer_defaults['bizlight-home-testimonial-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Testimonial %s', 'bizlight' ),
                'section'               => 'bizlight-home-testimonial-pages',
                'type'                  => 'dropdown-pages',
                'priority'              => 10,
                'description'           => ''
            )
        ),
        'bizlight-home-testimonial-pages-divider' => array(
            'control' => array(
                'section'               => 'bizlight-home-testimonial-pages',
                'type'                  => 'message',
                'priority'              => 20,
                'description'           => '<br /><hr />'
            )
        )
    );