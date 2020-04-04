<?php
global $bizlight_panels;
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-fs-pages'] = 0;

/*page selection*/
$bizlight_sections['bizlight-fs-pages'] =
    array(
        'priority'       => 40,
        'title'          => __( 'Select Slider From Page', 'bizlight' ),
        'description'    => __( ' Recommended featured image size 1360 * 530 for selected pages', 'bizlight' ),
        'panel'          => 'bizlight-featured-slider',
    );

/*creating setting control for bizlight-fs-page start*/
$bizlight_repeated_settings_controls['bizlight-fs-pages'] =
    array(
        'repeated' => 4,
        'bizlight-fs-pages-ids' => array(
            'setting' =>     array(
                'default'              => $bizlight_customizer_defaults['bizlight-fs-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Slide %s', 'bizlight' ),
                'section'               => 'bizlight-fs-pages',
                'type'                  => 'dropdown-pages',
                'priority'              => 10,
                'description'           => ''
            )
        ),
        'bizlight-fs-pages-divider' => array(
            'control' => array(
                'section'               => 'bizlight-fs-pages',
                'type'                  => 'message',
                'priority'              => 20,
                'description'           => '<br /><hr />'
            )
        )
    );