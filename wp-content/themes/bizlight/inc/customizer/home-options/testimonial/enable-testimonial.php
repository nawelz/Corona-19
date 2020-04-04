<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-home-testimonial-image-enable']     = 1;
$bizlight_customizer_defaults['bizlight-home-testimonial-enable']           = 1;

/*testimonialsetting*/
$bizlight_sections['bizlight-home-testimonial-enable-setting'] =
    array(
        'priority'       => 10,
        'title'          => __( 'Testimonial Enable Options', 'bizlight' ),
        'panel'          => 'bizlight-home-testimonial',
    );

$bizlight_settings_controls['bizlight-home-testimonial-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-testimonial-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Testimonial', 'bizlight' ),
            'section'               => 'bizlight-home-testimonial-enable-setting',
            'type'                  => 'checkbox',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );

    
$bizlight_settings_controls['bizlight-home-testimonial-image-enable'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-home-testimonial-image-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Image On Testimonial', 'bizlight' ),
            'section'               => 'bizlight-home-testimonial-enable-setting',
            'type'                  => 'checkbox',
            'priority'              => 55,
            'active_callback'       => ''
        )
    );