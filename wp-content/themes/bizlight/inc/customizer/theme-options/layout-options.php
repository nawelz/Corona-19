<?php
global $bizlight_sections;
global $bizlight_settings_controls;
global $bizlight_repeated_settings_controls;
global $bizlight_customizer_defaults;

/*defaults values*/
$bizlight_customizer_defaults['bizlight-default-layout'] = 'right-sidebar';


$bizlight_sections['bizlight-layout-options'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Layout Options', 'bizlight' ),
        'panel'          => 'bizlight-theme-options',
    );

/*layout-options option responsive lodader start*/
$bizlight_settings_controls['bizlight-default-layout'] =
    array(
        'setting' =>     array(
            'default'              => $bizlight_customizer_defaults['bizlight-default-layout'],
        ),
        'control' => array(
            'label'                 =>  __( 'Default Layout', 'bizlight' ),
            'description'           =>  __( 'Layout for all archives, single posts and pages', 'bizlight' ),
            'section'               => 'bizlight-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'right-sidebar' => __( 'Content - Primary Sidebar', 'bizlight' ),
                'left-sidebar' => __( 'Primary Sidebar - Content', 'bizlight' ),
                'no-sidebar' => __( 'No Sidebar', 'bizlight' )
            ),
            'priority'              => 20,
            'description'           => '',
            'active_callback'       => ''
        )
    );